const defaultPreviewImage = 'https://cdn-icons-png.flaticon.com/512/149/149071.png'

function selectElement(id) {
    return document.getElementById(id)
}

selectElement('previewImage').src = defaultPreviewImage


// selectElement('applicantPhoto').onchange = e => {
//     const fileObj = e.target.files && e.target.files[0];
//     if (!fileObj) {
//         return;
//     }
//     selectElement('previewImage').src = URL.createObjectURL(fileObj)
// }

angular.module('mscformApp', [])
    .controller('msc-form-controller', ($scope) => {
        $scope.applicant = {
            "photo": "https://cdn-icons-png.flaticon.com/512/149/149071.png",
            "name": "shahriar",
            "fatherName": "abcd",
            "motherName": "abcd",
            "gender": "male", "religion": "Hindu",
            "email": "shahriar1904@cseku.ac.bd", "phone": "01631560063",
            "permanentAddress": "Khan Bahadur Ahsanulla Hall, Khulna University, Khulna",
            "birthDate": new Date(),
            "nationality": "weeqw", "discipline": "URP",
            "presentAddress": "111",
            "hons_passing_yr": 1111,
            "hons_university": "111", "hons_GPA": 111, "hsc_GPA": 11111, "hsc_board_name": "111",
            "hsc_passing_yr": 111, "ssc_passing_yr": 111, "ssc_board_name": "1", "ssc_GPA": 111,
            "companyName": "111", "companyPosition": "111",
            "joiningDate": new Date(),
        }
        $scope.researchHistory = []
        $scope.addResearch = () => {
            $scope.researchHistory.push({
                index: $scope.researchHistory.length,
                title: "",
                supervisorName: "",
                supervisor1Position: ""
            })
        }
        $scope.deleteResearch = index => {
            $scope.researchHistory = $scope.researchHistory.filter(research => research.index !== index);
        }
        $scope.submitMastersForm = () => {
            $scope.photo = null
            let keys = []
            for (let key in $scope.applicant) {
                keys.push(key)
            }
            console.log(JSON.stringify(keys))
            $('#myModal').modal('show')
        }

        $scope.selectImage = (event) => {
            let files = event.target.files;
            let reader = new FileReader();
            reader.onload = function (e) {
                $scope.applicant.photo = e.target.result;
                //  if ($scope.checkImageDimensions(e.target.result))
                selectElement('previewImage').src = e.target.result;

                $scope.$apply();
            };
            reader.readAsDataURL(files[0]);
        }
        $scope.checkImageDimensions = function (imgURL) {
            let img = new Image();
            img.onload = () => {
                if (img.width == 300 && img.height == 400) {
                    return 1
                }
                alert("The image dimension is incorrect!");
                return 0
            }
            img.src = imgURL;
        }
        $scope.confirmSubmission = () => {
            let photo = $scope.applicant.photo
            let applicant = JSON.parse(JSON.stringify($scope.applicant))
            applicant.photo = "abcd"
            fetch('/api/confirmSubmission', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(applicant)
            }).then(res => res.json())
                .then(async (newApplicant) => {

                    let promises = [uploadImage(photo, newApplicant.data.id)]

                    for (let research of $scope.researchHistory) {
                        promises.push(fetch('/api/storeResearch', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                ...research,
                                'applicantId': newApplicant.data.id,
                            })
                        }).then(res => res.json())
                            .then(data => {
                                console.log(data)
                                generatePDF()
                            })
                        )
                    }
                    await Promise.all(promises)
                })
        }
    })

function generatePDF() {
    const divElement = document.getElementById('pdfContainer');

    let mywindow = window.open('', 'PRINT', 'height=650,width=900,top=100,left=150');

    mywindow.document.write(`<html><head><title>Form</title>`);
    mywindow.document.write('</head><body >');
    mywindow.document.write(`
        	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost:8000/css/app.css">

    `);
    mywindow.document.write(divElement.innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close();
    mywindow.focus();
    mywindow.print();

}
async function uploadImage(base64Image, id) {
    let formData = new FormData()
    let blob = await fetch(base64Image)
        .then(res => res.blob())
    formData.append('image', blob)
    let url = await fetch('/api/upload', {
        method: 'POST',
        body: formData,
        headers: {
            ext: 'jpg',
            id
        }
    }).then(res => res.json())
    return url
}
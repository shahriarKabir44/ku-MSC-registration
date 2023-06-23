const defaultPreviewImage = 'https://cdn-icons-png.flaticon.com/512/149/149071.png'

function selectElement(id) {
    return document.getElementById(id)
}

selectElement('previewImage').src = defaultPreviewImage



angular.module('mscformApp', [])
    .controller('msc-form-controller', ($scope) => {
        $scope.applicant = {
            "photo": "https://cdn-icons-png.flaticon.com/512/149/149071.png",
            "name": "shahriar",
            programName: "PhD",
            signatue: "",
            bengaliName: "মোঃ শাহরিয়ার কবির",
            "fatherName": "Shahjahan kabir",
            "motherName": "Shahida Kabir",
            "gender": "male", "religion": "Hindu",
            "email": "shahriar1904@cseku.ac.bd", "phone": "01631560063",
            "permanentAddress": "Khan Bahadur Ahsanulla Hall, Khulna University, Khulna",
            "birthDate": new Date(),
            "nationality": "Bangladeshi", "discipline": "URP",
            "presentAddress": "Khan Bahadur Ahsanulla Hall, Khulna University, Khulna",

        }

        //employment info start
        $scope.formatEmploymentDates = () => {
            for (let employment of $scope.employments) {
                console.log(employment)
                employment.joiningDate = new Date(employment.joiningTime).toDateString()
                if (employment.endingTime == '' || employment.endingTime == null) employment.endingDate = '--'
                else employment.endingDate = new Date(employment.endingTime).toDateString()

            }
        }
        $scope.employments = []
        $scope.addEmployment = () => {
            $scope.employments.push({
                index: $scope.employments.length,
                companyName: "",
                companyPosition: "",
                joiningDate: "",
                endingDate: "",
                isCurrentlyWorking: false,
                joiningTime: "",
                endingTime: ""
            })
        }
        $scope.removeEmployment = (index) => {
            $scope.employments = $scope.employments.filter(employment =>
                employment.index != index)
        }
        $scope.setCurrentlyWorkingFlag = employment => {
            $scope.employments[employment.index].isCurrentlyWorking = true
            $scope.employments[employment.index].endingTime = ''
        }

        $scope.setLeavingDate = employment => {
            employment.isCurrentlyWorking = false
        }
        $scope.storeEmploymentInfo = (applicantId, promises) => {
            for (let employment in $scope.employments) {
                promises.push(fetch('/api/addApplicantEmployment', {
                    method: 'post',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        ...employment,
                        applicantId
                    })
                }).then(res => res.json()).then(data => {
                    console.log(data)
                }))
            }
        }
        //employment info end


        //education info start
        $scope.educationHistories = [
            {
                examName: 'SSC',
                board_university: "Dhaka",
                subject: "Science",
                result: "4.00",
                scored_out_of: "5.00",
                passingYear: "2016",
                index: 0,

            },
            {
                examName: 'HSC',
                board_university: "Dhaka",
                subject: "Science",
                result: "4.00",
                scored_out_of: "5.00",
                passingYear: "2018",
                index: 1,
            },
            {
                examName: "Bachelor's",
                board_university: "Dhaka Univerwsity",
                subject: "Science",
                result: "4.00",
                scored_out_of: "4.00",
                passingYear: "202023",
                index: 2,

            },
        ]
        $scope.deleteEducationHistory = index => {
            $scope.educationHistories = $scope.educationHistories.filter(educationHistory =>
                educationHistory.index != index)
        }
        $scope.addEducationHistory = () => {
            $scope.educationHistories.push({
                examName: '',
                board_university: "",
                subject: "",
                result: "",
                scored_out_of: "",
                passingYear: "",
                index: $scope.educationHistories.length,
                scored_out_of: ""
            })
        }

        $scope.postApplicantEducationHistory = (applicantId, promises) => {
            for (let educationHistory of $scope.educationHistories) {
                promises.push(fetch('/api/addApplicantEducation', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        ...educationHistory, applicantId
                    })
                }).then(res => res.json()).then(data => {
                    console.log(data)
                }))
            }
        }
        //education history end




        //research history start
        $scope.researchHistory = []
        $scope.addResearch = () => {
            $scope.researchHistory.push({
                index: $scope.researchHistory.length,
                title: "",
                publishingDate: "",
                publishingTime: "",
                paperLink: ""
            })
        }
        $scope.deleteResearch = index => {
            $scope.researchHistory = $scope.researchHistory.filter(research => research.index !== index);
        }
        $scope.reformatPaperDates = () => {
            for (let paper of $scope.researchHistory) {
                let date = new Date(paper.publishingTime).toDateString()
                paper.publishingDate = date
            }
        }
        $scope.storeResearchHistory = (applicantId, promises) => {
            for (let researchHistory of $scope.researchHistory) {
                promises.push(fetch('/api/storeResearchHistory', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        ...researchHistory,
                        applicantId
                    })
                }))
            }
        }

        //research history start

        //proposed researches start
        $scope.proposedResearches = []

        $scope.addProposedResearch = () => {
            $scope.proposedResearches.push({
                index: $scope.proposedResearches.length,
                title: "",
                supervisorName: "",
                supervisorPosition: ""
            })
        }
        $scope.deleteProposedResearch = index => {
            $scope.proposedResearches = $scope.proposedResearches.filter(proposedResearch => proposedResearch.index !== index);
        }
        $scope.storeProposedResearch = (applicantId, promises) => {
            for (let proposedResearch of $scope.proposedResearches) {
                promises.push(fetch('/api/storeProposedResearch', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        ...proposedResearch,
                        applicantId
                    })
                }).then(res => res.json()).then(data => {
                    console.log(data)
                }))


            }
        }
        //proposed researches end



        // images segment start
        $scope.isPhotoChanged = [0, 0]

        $scope.selectSignatureImage = (event) => {
            let files = event.target.files;
            let reader = new FileReader();
            reader.onload = function (e) {
                $scope.applicant.signature = e.target.result;
                //if ($scope.checkSignatureImageDimensions(e.target.result))
                selectElement('previewSignatureImage').src = e.target.result;
                $scope.isPhotoChanged[1] = 1

                $scope.$apply();
            };
            reader.readAsDataURL(files[0]);
        }
        $scope.selectImage = (event) => {
            let files = event.target.files;
            let reader = new FileReader();
            reader.onload = function (e) {
                $scope.applicant.photo = e.target.result;
                //if ($scope.checkImageDimensions(e.target.result))
                selectElement('previewImage').src = e.target.result;
                $scope.isPhotoChanged[0] = 1

                $scope.$apply();
            };
            reader.readAsDataURL(files[0]);
        }
        $scope.checkImageDimensions = function (imgURL) {
            let img = new Image();
            img.onload = () => {
                if (img.width == 300 && img.height == 300) {
                    return 1
                }
                alert("The image dimension is incorrect!");
                return 0
            }
            img.src = imgURL;
        }
        $scope.checkSignatureImageDimensions = function (imgURL) {
            let img = new Image();
            img.onload = () => {
                if (img.width == 300 && img.height == 300) {
                    return 1
                }
                alert("The image dimension is incorrect!");
                return 0
            }
            img.src = imgURL;
        }
        //images segment end


        $scope.reformatDates = () => {
            $scope.applicant.birthDate = new Date($scope.applicant.birthDate).toDateString()
            $scope.reformatPaperDates()
            $scope.formatEmploymentDates()
        }
        $scope.submitMastersForm = () => {
            $scope.applicant.name = $scope.applicant.name.toUpperCase();
            $scope.applicant.fatherName = $scope.applicant.fatherName.toUpperCase();
            $scope.applicant.motherName = $scope.applicant.motherName.toUpperCase();
            $scope.reformatDates()
            if ($scope.validateForm())
                $('#myModal').modal('show')
        }
        $scope.validateForm = () => {
            if ($scope.programName != "Master_s") {
                if ($scope.researchHistory.length == 0) {
                    alert("You must add at least one research paper");
                    return 0
                }
            }
            if ($scope.proposedResearches.length == 0) {
                alert("You must add at least one research proposal");
                return 0
            }
            if ($scope.isPhotoChanged[0] == 0) {
                alert("You must add your photo");
                return 0
            }
            if ($scope.isPhotoChanged[1] == 0) {
                alert("You must add your signature");
                return 0
            }
            return 1
        }
        $scope.confirmSubmission = () => {
            let { signatue, photo } = $scope.applicant
            let applicant = structuredClone($scope.applicant)
            applicant.photo = "abcd"
            applicant.signatue = "wfhwei"
            fetch('/api/createApplicant', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(applicant)
            }).then(res => res.json())
                .then(async (newApplicant) => {

                    let promises = [uploadImage(photo, newApplicant.data.id), uploadImage(signatue, newApplicant.data.id, '/uploadSignature')]
                    $scope.storeProposedResearch(newApplicant.data.id, promises)
                    $scope.storeResearchHistory(newApplicant.data.id, promises)
                    $scope.postApplicantEducationHistory(newApplicant.data.id, promises)
                    await Promise.all(promises)
                    $('#confirmationModal').modal('show')

                })
        }
    })

function generatePDF() {
    const divElement = document.getElementById('pdfContainer');

    let mywindow = window.open('', 'PRINT', 'height=650,width=1000,top=100,left=150');

    mywindow.document.write(`<html><head><title>Form info</title>`);
    mywindow.document.write('</head><body style="margin:50px auto; max-width:100% !important;" >');
    mywindow.document.write(`
        	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/app.css">

    `);
    mywindow.document.write(divElement.innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close();
    mywindow.focus();
    mywindow.print();

}
async function uploadImage(base64Image, id, path = '/upload') {
    let formData = new FormData()
    let blob = await fetch(base64Image)
        .then(res => res.blob())
    formData.append('image', blob)
    let url = await fetch('/api' + path, {
        method: 'POST',
        body: formData,
        headers: {
            ext: 'jpg',
            id
        }
    }).then(res => res.json())
    return url
}
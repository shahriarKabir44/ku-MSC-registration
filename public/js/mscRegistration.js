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
            photo: defaultPreviewImage
        }



        $scope.selectImage = (event) => {
            let files = event.target.files;
            let reader = new FileReader();
            reader.onload = function (e) {
                $scope.applicant.photo = e.target.result;
                selectElement('previewImage').src = e.target.result;
                uploadImage(e.target.result)
                $scope.$apply();
            };
            reader.readAsDataURL(files[0]);
        }
    })


async function uploadImage(base64Image) {
    let formData = new FormData()
    let blob = await fetch(base64Image)
        .then(res => res.blob())
    formData.append('image', blob)
    let url = await fetch('/api/upload', {
        method: 'POST',
        body: formData,
        headers: {
            ext: 'jpg'
        }
    }).then(res => res.json())
    return url
}
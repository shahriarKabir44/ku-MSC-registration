const defaultPreviewImage = 'https://cdn-icons-png.flaticon.com/512/149/149071.png'

function selectElement(id) {
    return document.getElementById(id)
}

selectElement('previewImage').src = defaultPreviewImage


selectElement('applicantPhoto').onchange = e => {
    const fileObj = e.target.files && e.target.files[0];
    if (!fileObj) {
        return;
    }
    selectElement('previewImage').src = URL.createObjectURL(fileObj)
}


selectElement('mscForm').onsubmit = e => {
    e.preventDefault()
    const formData = new FormData(e.target)
    let data = {}
    for (const [key, value] of formData.entries()) {
        data[key] = value;
    }
    console.log(data)
}


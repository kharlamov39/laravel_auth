document.getElementById('file1').addEventListener('change', function() {
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('image1').setAttribute('src', e.target.result);
            document.getElementById('image1').style.display = 'block';
        };
        reader.readAsDataURL(this.files[0]);
    }
});
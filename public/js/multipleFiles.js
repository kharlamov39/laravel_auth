jQuery(document).ready(function () {
    ImgUpload();
  });
  
  function ImgUpload() {
    var imgWrap = "";
    var hiddenImages = document.querySelector('.hidden-file');

    var imgArray = (hiddenImages.value == '') ? [] : JSON.parse(hiddenImages.value);
    var resNames = (hiddenImages.value == '') ? [] : JSON.parse(hiddenImages.value);
 
    $('.upload__inputfile').each(function () {
      $(this).on('change', function (e) {
        imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
        var maxLength = $(this).attr('data-max_length');
        console.log(1)
  
        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);
        var iterator = 0;
        filesArr.forEach(function (f, index) {
          if (!f.type.match('image.*')) { 
            return;
          }
  
          if (imgArray.length > maxLength) {
            return false
          } else {
            var len = 0;
            for (var i = 0; i < imgArray.length; i++) {
              if (imgArray[i] !== undefined) {
                len++;
              }
            }
            if (len > maxLength) {
              return false;
            } else {
              imgArray.push(f);
              resNames.push(f.name); /* is not a function */
              
              console.log(imgArray)
              console.log(resNames)

              var reader = new FileReader();
              reader.onload = function (e) {
                var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                imgWrap.append(html);
                iterator++;
                console.log(8)
              }
              reader.readAsDataURL(f);
            }
          }
        });

        hiddenImages.value = JSON.stringify(resNames);
        
      });
    });
  
    $('body').on('click', ".upload__img-close", function (e) {
      var file = $(this).parent().data("file");
      for (var i = 0; i < resNames.length; i++) {
        if (resNames[i] === file) {
          resNames.splice(i, 1);
          // resNames.splice(i, 1);
          hiddenImages.value = JSON.stringify(resNames);
          break;
        }
      }
      $(this).parent().parent().remove();
    });
  }
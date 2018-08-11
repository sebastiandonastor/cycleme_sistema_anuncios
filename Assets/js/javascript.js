$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

    function showImage(src){
        //$('#myModal').modal({ backdrop: false});
        $('#myModal').modal('show');
        let imgModal = document.getElementById("imgModal");
        imgModal.src = src;
      
    }

    function hideImage(){
        $('#myModal').modal('hide');
    }

    function buenDisplay(img,name){

        var modalImg = document.getElementById("modal3");
        modalImg.style ="width: 75% !important ; max-height: 85% !important ; overflow-y: hidden !important ;";
        var instance = M.Modal.getInstance(modalImg);
    
        document.getElementById('nombreModal').innerHTML = name;
        document.getElementById('imgModal').src = img;
    
        $('#myModalImgDisplay').modal('show');
    }


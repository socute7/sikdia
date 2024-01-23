$(document).ready(function() {
    ambilUser();
});

function ambilUser(){
    var iduser = $("[name='iduser']").val();
    var link = $('#baseurl').val();
    var base_url = link + 'profile/detail_data';
    var link_gambar = link + 'assets/upload/pengguna/';
    
    $.ajax({
        type:'POST',
        data:'id='+iduser,
        url:base_url,
        dataType:'json',
        success: function(data){
            $("#namaP").text(data[0].nama);
            document.getElementById('img').src = link_gambar+data[0].foto;
        }   
    });
}

function pesanHeader(merk, deskripsi, status) {
    swal.fire({
        title: merk,
        text: deskripsi,
        icon: status,
        confirmButtonColor: '#4e73df',
    });
}

// ambil elemen2 yang dibutuhkan
var url1 = document.getElementById ('url').value;
var keyword = document.getElementById ('keyword');
var jenis = document.getElementById ('jenis');
var container = document.getElementById ('datanya');

// tambahkan event ketika keyword ditulis
keyword.addEventListener ('keyup', function() {
    // buat object ajax
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = function() {
        if( xhr.readyState == 4 && xhr.status == 200 ) {
            container.innerHTML = xhr.responseText; 
        }
    }

    // eksekusi ajax
    let url = url1 +'/ajax/datauser.php?keyword=' + keyword.value +'&jenis=' + jenis.value
    xhr.open('GET', url , true);
    xhr.send();
    
});

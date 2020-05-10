# Get API RajaOngkir For Laravel


**Instalasi**

Download package dengan composer
```
composer require hilmibukhori5/api-RajaOngkir
```

Edit kode berikut di file getApiRajaOngkir.php untuk konfigurasi API rajaongkir
```
CURLOPT_URL => "isi_base_url_api_akun_anda_disini", 
CURLOPT_HTTPHEADER => array(
            "key: isi_api_key_anda_disini"),
```

**Penggunaan**

Ambil data provinsi
```php
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_HTTPHEADER => array(
    "key: isi_api_key_anda_disini"
),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $response=json_decode($response,true);
    $data_pengirim = $response['rajaongkir']['results'];
    return $data_pengirim;
}
```

Ambil data kota
```php
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.rajaongkir.com/api/city?&province=$id",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_HTTPHEADER => array(
    "key: isi_api_key_anda_disini"
),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $response=json_decode($response,true);
    $data_kota = $response['rajaongkir']['results'];
    return json_encode($data_kota);
}
```

File Soal Task 1
```
/task1.php
```

Kunjungi [rajaongkir](http://rajaongkir.com/)

Documentasi akun [starter](http://rajaongkir.com/dokumentasi/starter)
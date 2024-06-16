<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=1200"> <!-- Set the viewport width to a desktop size -->
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Hai</title>
   <link rel="stylesheet" href="{{ asset('fonts/SFPRODISPLAYREGULAR.OTF') }}">
   <link rel="stylesheet" href="{{ asset('css/main.css') }}">
   <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body style="background-image: url('{{asset('image/container/background.jpg')}}')">
   <!--Loading Page-->
   <div id="loading">
   <div class="loadingBar"></div>
   <p id="loadingText">Loading Content.</p>
   </div>
   <div id="center-paymentPage">
      <div id="paymentPage">
         <div id="colorPayment">
         <div class="pv">
            <div class="pv-con-1" style="width: 20%">
               <img src="{{asset('image/content/pat.png')}}" loading="none">
               <img src="{{asset('image/content/name.png')}}" loading="none">
            </div>
            <div class="pv-con-2">
               <p id="pm-title">Empty</p>
               <p id="pm-desc">Empty</p>
            </div>
            <div class="pv-con-3">
               <p id="pm-foot">Hemat s/d<br>Rp. </p>
            </div>
         </div>
         </div>
         <div id="infoPayment">
            <p>Masa Berlaku</p>
            <p id="endLastTime">000000</p>
            <p>Promosi</p>
            <p id="infoPaymentText">Voucher ini berlaku sesuai ketentuan berikut:<br>
               &nbsp;1. Semua toko yang bekerjasama dengan Vocheers!
               dengan ketentuan:<br>
               &nbsp;&nbsp;a. Minimal dan maksimal pembelian di THIS MAX USE<br>
               &nbsp;&nbsp;b. Jika pembelian dibawah atau diatas THIS MAX USE maka voucher tidak berlaku</p>
         </div>
         <div id="pagebuttonPayment">
         <div id="buttonPayment">
            <p>Total</p>
            <p id="valueInfoPayment">Rp. 0</p>
            <button type="button" id="redirectPayment" onclick="payVoucher()">Buy</button>
         </div>
         </div>
      </div>
   </div>
   <!--Navbar-->
   <div id="navbar">
      <div id="ham" onclick="showMenu()">
      <img src="{{asset('image/ham.png')}}" loading="none"/>
      <div id="menu-ham">
         <p onclick="changePage(1)">Home</p>
         <div class="aline"></div>
         <p onclick="changePage(2)">Voucher Saya</p>
         <div class="aline"></div>
         <p onclick="changePage(2)">Histori Voucher</p>
      </div>
      </div>
      <img src="{{asset('image/content/name-with-pat-red.png')}}" loading="none"/>
   </div>
   <div id="fixedNavbar">
      <div id="ham" onclick="showMenu()">
      <img src="{{asset('image/ham.png')}}" loading="none"/>
      <div id="fmenu-ham">
         <p onclick="changePage(1)">Home</p>
         <div class="aline"></div>
         <p onclick="changePage(2)">Voucher Saya</p>
         <div class="aline"></div>
         <p onclick="changePage(2)">Histori Voucher</p>
      </div>
      </div>
      <img src="{{asset('image/content/name-with-pat-red.png')}}" loading="none"/>
   </div>
      <!--End Navbar-->
   </div>
   <section id="maindisplay1">

   <div class="banner-1">
      <div>
      <p>Raih Diskon & Promo</p>
      <p>Hanya Di <img src="{{asset('image/content/name-with-pat.png')}}" style="margin: auto; width: 14vw;" alt="Vouchers"></p>
      <br>
      <button type="button" id="search" onclick="scrollToPosition(800)">Cari Voucher</button>
      </div>
      <div>
         <img src="{{asset('image/content/girl-holding-phone.png')}}" loading="none"/>
      </div>
   </div>
   <div class="con-search">
   <div class="search">
      <div>
         <input type="text" id="find" placeholder="Search Here" oninput="searchVoucher()">
      </div>
      <div>
      </div>
   </div>
   <div id="listSearch">
      <div class="searchResultContainer" id="containerSearch" onclick=""></div>
  </div>         
   </div>
   <div class="banner-2">
      <img src="{{asset('image/banner 1-01.jpg')}}" loading="none">
   </div>
   <div class="tagline">
   <p>KATEGORI</p>
   </div>
   <div class="list-tagline">
      <div class="display-tagline">
         <div class="conta-tagline" onclick="listVoucher(1)" id="makanan">
            <img src="{{asset('image/container/apple.png')}}" alt="" loading="none">
            <p>Makanan</p>
         </div>
         <div class="conta-tagline" onclick="listVoucher(2)" id="gaya">
            <img src="{{asset('image/container/camera.png')}}" alt="" loading="none">
            <p>Gaya Hidup</p>
         </div>
         <div class="conta-tagline" onclick="listVoucher(3)" id="elek">
            <img src="{{asset('image/container/phone.png')}}" alt="" loading="none" style="width: 10%">
            <p>Elektrik</p>
         </div>
      </div>
   </div>
   <div id="show-voucher-1">
   <div class="tagline" style="max-width: 29%; margin-top: 40px;">
      <p>VOUCHER MAKANAN</p>
   </div>
   <div id="promo-voucher">
   @foreach($exvoucher as $voucher)
      @foreach($voucher['list_voucher'] as $list_voucher)
      @if($voucher['kategori'] == "makanan")
      <div class="pv">
         <div class="pv-con-1">
            <img src="{{asset('image/container/apple.png')}}" loading="none" style="filter: grayscale(100%) invert(100%) brightness(150%); width: 30%;">
            <img src="{{asset('image/content/name.png')}}" loading="none">
         </div>
         <div class="pv-con-2">
            <p>{!! $list_voucher['title'] !!}</p>
            <p>Berlaku Hingga: {{$list_voucher['to']}}</p>
         </div>
         <div class="pv-con-3">
            <p>Hemat s/d<br>Rp. {{$list_voucher['max_use']}}</p>
            <button type="button" id="hoveringButton" onclick="beliVoucher('{{$voucher['kategori']}}', {{$list_voucher['id']}})">Buy</button>
         </div>
      </div>
   @endif
   @endforeach
   @endforeach
   </div>
   </div>
   <div id="show-voucher-2">
   <div class="tagline" style="max-width: 29%; margin-top: 40px;">
      <p>VOUCHER GAYA HIDUP</p>
   </div>
   <div id="promo-voucher">
      @foreach($exvoucher as $voucher)
         @foreach($voucher['list_voucher'] as $list_voucher)
         @if($voucher['kategori'] == "gaya hidup")
         <div class="pv">
            <div class="pv-con-1">
               <img src="{{asset('image/container/camera.png')}}" loading="none" style="filter: grayscale(100%) invert(100%) brightness(150%); width: 30%;">
               <img src="{{asset('image/content/name.png')}}" loading="none">
            </div>
            <div class="pv-con-2">
               <p>{!! $list_voucher['title'] !!}</p>
               <p>Berlaku Hingga: {{$list_voucher['to']}}</p>
            </div>
            <div class="pv-con-3">
               <p>Hemat s/d<br>Rp. {{$list_voucher['max_use']}}</p>
               <button type="button" id="hoveringButton" onclick="beliVoucher('{{$voucher['kategori']}}', {{$list_voucher['id']}})">Buy</button>
            </div>
         </div>
      @endif
      @endforeach
      @endforeach
      </div>
   </div>
   <div id="show-voucher-3">
   <div class="tagline" style="max-width: 29%; margin-top: 40px;">
      <p>VOUCHER ELEKTRIK</p>
   </div>
   <div id="promo-voucher">
      @foreach($exvoucher as $voucher)
         @foreach($voucher['list_voucher'] as $list_voucher)
         @if($voucher['kategori'] == "elektrik")
         <div class="pv">
            <div class="pv-con-1">
               <img src="{{asset('image/container/phone.png')}}" loading="none" style="filter: grayscale(100%) invert(100%) brightness(150%); width: 30%;">
               <img src="{{asset('image/content/name.png')}}" loading="none">
            </div>
            <div class="pv-con-2">
               <p>{!! $list_voucher['title'] !!}</p>
               <p>Berlaku Hingga: {{$list_voucher['to']}}</p>
            </div>
            <div class="pv-con-3">
               <p>Hemat s/d<br>Rp. {{$list_voucher['max_use']}}</p>
               <button type="button" id="hoveringButton" onclick="beliVoucher('{{$voucher['kategori']}}', {{$list_voucher['id']}})">Buy</button>
            </div>
         </div>
      @endif
      @endforeach
      @endforeach
      </div>
   </div>
   <div id="promo-voucher">
      <div class="text-promo">
         <p>VOUCHER PROMO</p>
      </div>
      @foreach($exvoucher as $voucher)
      @foreach($voucher['list_voucher'] as $list_voucher)
      @if($voucher['kategori'] == "promo")
      <div class="pv">
         <div class="pv-con-1">
            <img src="{{asset('image/content/pat.png')}}" loading="none">
            <img src="{{asset('image/content/name.png')}}" loading="none">
         </div>
         <div class="pv-con-2">
            <p>{!! $list_voucher['title'] !!}</p>
            <p>Berlaku Hingga: {{$list_voucher['to']}}</p>
         </div>
         <div class="pv-con-3">
            <p>Hemat s/d<br>Rp. {{$list_voucher['max_use']}}</p>
            <button type="button" id="hoveringButton" onclick="beliVoucher('{{$voucher['kategori']}}', {{$list_voucher['id']}})">Buy</button>
         </div>
      </div>
   @endif
   @endforeach
   @endforeach
   </div>
   <div id="promo-voucher">
   <div class="text-promo">
      <p>SPECIAL PROMO VOCHEERS!</p>
   </div>
   </div>
   <div style="height: 60vh; overflow-y: auto">
   @foreach($exvoucher as $voucher)
      @foreach($voucher['list_voucher'] as $special)
      @if($voucher['kategori'] == "special promo")
   <div class="special-voucher">
      <div>
         <img src="{{asset($special['path_image'])}}" alt="" loading="none">
      </div>
      <div class="info-special-voucher">
         <div>
            <p>Masa Berlaku</p>
            <p>{{$special['from']}} - {{$special['to']}}</p>
            <p>Promosi</p>
            <p>Voucher ini berlaku sesuai ketentuan berikut:<br>
               &nbsp;1. Semua toko yang bekerjasama dengan Vocheers!
               dengan ketentuan:<br>
               &nbsp;&nbsp;a. Minimal dan maksimal pembelian di Rp100RB<br>
               &nbsp;&nbsp;b. Jika pembelian dibawah atau diatas Rp100RB maka voucher tidak berlaku</p>
         </div>
         <div>
         <button type="button" id="specialButton" onclick="beliVoucher('{{$voucher['kategori']}}', {{$list_voucher['id']}})">Check</button>
         </div>
      </div>
   </div>
   <br>
   @endif
   @endforeach
   @endforeach
   </div>
</section>
<section id="maindisplay2">
   <div id="list-history-voucher"></div>
</section>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script defer>
var cacid = 0;
var chcpay = "THIS MAX USE";


function beliVoucher(kategori, id) {
   const infoPaymentElement = document.getElementById('infoPaymentText');

   // Get the HTML content of the element
   let infoPaymentText = infoPaymentElement.innerHTML;

   exvoucher.forEach(function(fir) {
      if(kategori == fir.kategori) {
         fir['list_voucher'].forEach(function(sec) {
            if(id == sec.id) {
               let rsplit = sec.require;
               let splitr = rsplit.trim().split("|");

               infoPaymentElement.innerHTML = infoPaymentText.replace(new RegExp(chcpay, 'g'), splitr[1]);

               chcpay = splitr[1];

               document.getElementById('endLastTime').innerText = sec.from + " - " + sec.to;
               document.getElementById('valueInfoPayment').innerText = "Rp. 10.000";
               document.getElementById('pm-title').innerHTML = sec.title;
               document.getElementById('pm-desc').innerText = "Berlaku Hingga: " + sec.to;
               document.getElementById('pm-foot').innerHTML = "Hemat s/d<br>Rp. " + sec.max_use;

               let currentOnclickValue = 'payVoucher("' + fir.kategori + '", "' + sec.id + '")';
               document.getElementById('redirectPayment').setAttribute('onclick', currentOnclickValue);


               document.getElementById('center-paymentPage').style.display = 'flex';
            }
         })
      }
   })
}

document.addEventListener('click', function(event) {
    const centerPaymentPage = document.getElementById('center-paymentPage');
    const paymentPage = document.getElementById('paymentPage');

    // Check if the clicked element is not inside the paymentPage element
    if (!paymentPage.contains(event.target) && centerPaymentPage.contains(event.target)) {
        // Hide the center-paymentPage element
        centerPaymentPage.style.display = 'none';
    }
});

function listVoucher(id) {
   if(id == cacid) {
      cacid = 0;

      document.getElementById('show-voucher-1').style.display = 'none';
      document.getElementById('show-voucher-2').style.display = 'none';
      document.getElementById('show-voucher-3').style.display = 'none';

      document.getElementById('elek').style.color = '#C02026';
      document.getElementById('elek').style.filter = null;
      document.getElementById('makanan').style.color = '#C02026';
      document.getElementById('makanan').style.filter = null;
      document.getElementById('gaya').style.color = '#C02026';
      document.getElementById('gaya').style.filter = null;
   }
   else if(id == 1) {
      cacid = 1;
      
      document.getElementById('show-voucher-1').style.display = 'contents';
      document.getElementById('show-voucher-2').style.display = 'none';
      document.getElementById('show-voucher-3').style.display = 'none';

      document.getElementById('makanan').style.color = 'black';
      document.getElementById('makanan').style.filter = 'grayscale(100%)';
      document.getElementById('gaya').style.color = '#C02026';
      document.getElementById('gaya').style.filter = null;
      document.getElementById('elek').style.color = '#C02026';
      document.getElementById('elek').style.filter = null;
   }
   else if(id == 2) {
      cacid = 2;

      document.getElementById('show-voucher-1').style.display = 'none';
      document.getElementById('show-voucher-2').style.display = 'contents';
      document.getElementById('show-voucher-3').style.display = 'none';

      document.getElementById('gaya').style.color = 'black';
      document.getElementById('gaya').style.filter = 'grayscale(100%)';
      document.getElementById('makanan').style.color = '#C02026';
      document.getElementById('makanan').style.filter = null;
      document.getElementById('elek').style.color = '#C02026';
      document.getElementById('elek').style.filter = null;
   }
   else if(id == 3) {
      cacid = 3;

      document.getElementById('show-voucher-1').style.display = 'none';
      document.getElementById('show-voucher-2').style.display = 'none';
      document.getElementById('show-voucher-3').style.display = 'contents';

      document.getElementById('elek').style.color = 'black';
      document.getElementById('elek').style.filter = 'grayscale(100%)';
      document.getElementById('makanan').style.color = '#C02026';
      document.getElementById('makanan').style.filter = null;
      document.getElementById('gaya').style.color = '#C02026';
      document.getElementById('gaya').style.filter = null;
   }
}

var exvoucher = {!! json_encode($exvoucher) !!};
</script>
<script src="{{ asset('js/main.js') }}" defer></script>
</html>
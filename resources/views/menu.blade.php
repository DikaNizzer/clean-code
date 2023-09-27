<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,600,700&display=swap');

*{
	margin: 0;
	padding: 0;
	list-style: none;
	font-family: 'Montserrat', sans-serif;
	-webkit-box-sizing: border-box;
	        box-sizing: border-box;
}

body{
	background: #7fc469;
	color: #565e6b;
}

.wrapper{
	width: 500px;
	height: 100%;
	background: #fff;
	margin: 15px auto 0;
}

.wrapper .title{
	padding: 30px 20px;
	text-align: center;
	font-size: 24px;
	font-weight: 700;
	border-bottom: 1px solid #ebedec;
}

.wrapper .tabs_wrap{
	padding: 20px;
	border-bottom: 1px solid #ebedec;
}

.wrapper .tabs_wrap ul{
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-pack: center;
	    -ms-flex-pack: center;
	        justify-content: center;
}

.wrapper .tabs_wrap ul li{
	width: 135px;
    text-align: center;
    background: #e9ecf1;
    border-right: 1px solid #c1c4c9;
    padding: 13px 15px;
	cursor: pointer;
	-webkit-transition: all 0.2s ease;
	-o-transition: all 0.2s ease;
	transition: all 0.2s ease;
}

.wrapper .tabs_wrap ul li:first-child{
	border-top-left-radius: 25px;
	border-bottom-left-radius: 25px;
}

.wrapper .tabs_wrap ul li:last-child{
	border-right: 0px;
	border-top-right-radius: 25px;
	border-bottom-right-radius: 25px;
}

.wrapper .tabs_wrap ul li:hover,
.wrapper .tabs_wrap ul li.active{
	background: #7fc469;
	color: #fff;
}

.wrapper .container .item_wrap{
	padding: 10px 20px;
	border-bottom: 1px solid #ebedec;
	cursor: pointer;
}

.wrapper .container .item_wrap:hover{
	background: #e9ecf1;
}

.wrapper .container .item{
	position: relative;
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-align: center;
	    -ms-flex-align: center;
	        align-items: center;
	-webkit-box-pack: justify;
	    -ms-flex-pack: justify;
	        justify-content: space-between;
}

.item_wrap .item .item_left{
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-align: center;
	    -ms-flex-align: center;
	        align-items: center;
}

.item_wrap .item_left img{
	width: 70px;
	height: 70px;
	display: block;
}

.item_wrap .item_left .data{
	margin-left: 20px;
}

.item_wrap .item_left .data .name{
	font-weight: 600;
}

.item_wrap .item_left .data .distance{
	color: #7f8b9b;
	font-size: 14px;
	margin-top: 3px;
}

.item_wrap .item_right .status{
	position: relative;
	color: #77818d;
}

.item_wrap .item_right .status:before{
	content: "";
	position: absolute;
	top: 5px;
    left: -12px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: #b3bbc8;
}

.item_wrap.offline .item_right .status{
	color: #b3bbc8;	
}

.item_wrap.online .item_right .status:before{
	background: #7fc469;
}
    </style>

</head>
<body>

    {{-- Start --}}
    <div class="wrapper">
        <div class="title">
          Daftar Menu Makanan Indonesia
        </div>
        <div class="tabs_wrap">
          <ul>
            <li data-tabs="both" class="active">Semua</li>
            <li data-tabs="male">Makanan</li>
            <li data-tabs="female">Minuman</li>
          </ul>
        </div>
        <div class="container">
          <ul>

            @foreach ($makanans as $menu)
                    <li class="item_wrap male online">
                        <div class="item">
                        <div class="item_left">
                            <div class="img">
                            <img src="{{ asset('images/'.$menu->menu_picture) }}" alt="">
                            </div>
                            <div class="data">
                            <p class="name">{{$menu->menu_name}}</p>
                            <p class="distance">
                              Rp. {{number_format($menu->menu_prize)}}
                            </p>
                            </div>
                        </div>
                        <div class="item_right">
                            <div class="status">
                              @if($menu->menu_status === 1)
                              Tersedia
                          @else
                              Habis
                          @endif
                            </div>
                        </div>
                        </div>
                </li>
            @endforeach

            @foreach ($minumans as $minum)
                <li class="item_wrap female online">
                  <div class="item">
                    <div class="item_left">
                      <div class="img">
                        <img src="{{ asset('images/'.$minum->menu_picture) }}" alt="">
                      </div>
                      <div class="data">
                        <p class="name">{{$minum->menu_name}}</p>
                        <p class="distance">
                          Rp. {{number_format($minum->menu_prize)}}
                        </p>
                      </div>
                    </div>
                    <div class="item_right">
                      <div class="status">
                        @if($minum->menu_status === 1)
                            Tersedia
                        @else
                            Habis
                        @endif
                      </div>
                    </div>
                  </div>
                </li>
            @endforeach

          </ul>
        </div>
      </div>
    {{-- End --}}
    

    <script>

var tabs = document.querySelectorAll(".tabs_wrap ul li");
var males = document.querySelectorAll(".male");
var females = document.querySelectorAll(".female");
var all = document.querySelectorAll(".item_wrap");

tabs.forEach((tab)=>{
	tab.addEventListener("click", ()=>{
      tabs.forEach((tab)=>{
        tab.classList.remove("active");
      })

      tab.classList.add("active");
      var tabval = tab.getAttribute("data-tabs");

      all.forEach((item)=>{
        item.style.display = "none";
      })

      if(tabval == "male"){
        males.forEach((male)=>{
          male.style.display = "block";
        })
      }
      else if(tabval == "female"){
        females.forEach((female)=>{
          female.style.display = "block";
        })
      }
      else{
        all.forEach((item)=>{
          item.style.display = "block";
        })
      }

	})
})

            fetch('http://127.0.0.1:8000/api/menu')
            .then(response => response.json())
            .then(data => {
                // document.getElementById('api-data').textContent = data.message;
                console.log(data.data)
            });

            
    </script>
</body>
</html>
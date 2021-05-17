function change_img(img) {
  document.getElementById('product_img').src = document.getElementById(img).src;
}

function pop(go) {
  var wish = confirm("wishlist에 담았습니다. \nwishlist로 이동하시겠습니까?");
  if (wish) {
      location.replace(go);
  }
}

//필터 전체 체크/해제
function allChk1(e) {
  if(e.target.checked) {
    document.querySelectorAll(".size").forEach(function(v, i) {
      v.checked = true;
    });
  } else {
    document.querySelectorAll(".size").forEach(function(v, i) {
      v.checked = false;
    });
  }
}

function allChk2(e) {
  if(e.target.checked) {
    document.querySelectorAll(".shape").forEach(function(v, i) {
      v.checked = true;
    });
  } else {
    document.querySelectorAll(".shape").forEach(function(v, i) {
      v.checked = false;
    });
  }
}

function allChk3(e) {
  if(e.target.checked) {
    document.querySelectorAll(".flavor").forEach(function(v, i) {
      v.checked = true;
    });
  } else {
    document.querySelectorAll(".flavor").forEach(function(v, i) {
      v.checked = false;
    });
  }
}

function allChk4(e) {
  if(e.target.checked) {
    document.querySelectorAll(".sugar").forEach(function(v, i) {
      v.checked = true;
    });
  } else {
    document.querySelectorAll(".sugar").forEach(function(v, i) {
      v.checked = false;
    });
  }
}


function show_store_info(id) {

  document.getElementById(id).style.display ='block';

  var myAddress = ["서울 서대문구 신촌로29나길 7 1층"];
            
  // 맵을 넣을 div 
  var container = document.getElementById('map');
  var options = {
    center: new kakao.maps.LatLng(35.95, 128.25),
    level: 1
  };
          
  // 맵 표시 
  var map = new kakao.maps.Map(container, options);

    container.style.width = '400px';
    container.style.height = '300px'; 
    
  map.relayout();
            
  // 일반 지도와 스카이뷰로 지도 타입을 전환할 수 있는 지도타입 컨트롤을 생성
  var mapTypeControl = new kakao.maps.MapTypeControl();
  map.addControl(mapTypeControl, kakao.maps.ControlPosition.TOPRIGHT);
            
  // 지도 확대 축소를 제어할 수 있는 줌 컨트롤을 생성
  var zoomControl = new kakao.maps.ZoomControl();
  map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);
            
  // 주소 -> 좌표 변환 라이브러리 
  var geocoder = new kakao.maps.services.Geocoder();
                        
  //주소로 좌표 검색
  function myMarker(number, address) {
    geocoder.addressSearch(address, function(result, status) {
      if (status === kakao.maps.services.Status.OK) {
        var coords = new kakao.maps.LatLng(result[0].y, result[0].x);
              
        var marker = new kakao.maps.Marker({
        position: coords,
        clickable: true
        });
              
        // 마커를 지도에 표시
        marker.setMap(map);
                              
        map.setCenter(coords); //지도 중심 좌표 검색한 위치로 이동
      }
    });
  }
            
  //위치 이동
  for (i=0; i<myAddress.length; i++) {
    myMarker(i+1, myAddress[i]);
  }

  window.onpageshow = function(event){ // 뒤로가기 이벤트 발생시 새로고침
    if (event.persisted || (window.performance && window.performance.navigation.type == 2)){
      window.location.reload();
    }
  };
}

/*
function chkAllList1(e) {
  let checkCount = 0;
  document.querySelectorAll(".size").forEach(function(v, i) {
    if(v.checked === false){
      checkCount++;
    }
  });

  if(checkCount>0) {
    document.getElementById("allCheck1").checked = false;
  } else if(checkCount === 0) {
    document.getElementById("allCheck1").checked = true;
  }
}
function chkAllList2(e) {
  let checkCount = 0;
  document.querySelectorAll(".shape").forEach(function(v, i) {
    if(v.checked === false){
      checkCount++;
    }
  });

  if(checkCount>0) {
    document.getElementById("allCheck2").checked = false;
  } else if(checkCount === 0) {
    document.getElementById("allCheck2").checked = true;
  }
}
function chkAllList3(e) {
  let checkCount = 0;
  document.querySelectorAll(".flavor").forEach(function(v, i) {
    if(v.checked === false){
      checkCount++;
    }
  });

  if(checkCount>0) {
    document.getElementById("allCheck3").checked = false;
  } else if(checkCount === 0) {
    document.getElementById("allCheck3").checked = true;
  }
}
function chkAllList4(e) {
  let checkCount = 0;
  document.querySelectorAll(".sugar").forEach(function(v, i) {
    if(v.checked === false){
      checkCount++;
    }
  });

  if(checkCount>0) {
    document.getElementById("allCheck4").checked = false;
  } else if(checkCount === 0) {
    document.getElementById("allCheck4").checked = true;
  }
}
*/

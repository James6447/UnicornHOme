function getData(pageName){
  var req=new XMLHttpRequest();
  req.open("get","http://localhost:5566/UnicornHome/commentboard/"+pageName);
  req.onload=function(){
    var content=document.getElementById("refresh");
    refresh.innerHTML=this.responseText;
  };
  req.send();
}

function chnstatus_l(id){
  id.innerHTML="dislike";
}

function chnstatus_d(id){
  id.innerHTML="like";
}

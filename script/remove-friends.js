var list = "list id bo vao day";
var obj = list.split("|");
obj.forEach(function(id, index) {
	var a = document.createElement('script');
	a.innerHTML = "new AsyncRequest().setURI('/ajax/profile/removefriendconfirm.php').setData({ uid: " + id + ",norefresh:true }).send();";
document.body.appendChild(a);
    console.log(id);
});
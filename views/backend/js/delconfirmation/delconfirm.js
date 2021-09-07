function delconfirm(id,enitity) {
	document.getElementById("dellink"+id).innerHTML = '<span class="icon text-white-50"><i class="fas fa-trash"></i></span><span class="text">Confirmation</span>';
	document.getElementById("dellink"+id).setAttribute("onclick","delconfirm2("+id+",'"+enitity+"')");
	document.getElementById("dellink"+id).setAttribute("class","btn btn-success btn-icon-split");
}
function delconfirm2(id,enitity){
	document.getElementById("dellink"+id).setAttribute("href","supprimer"+enitity+".php?id"+enitity+"="+id);
}
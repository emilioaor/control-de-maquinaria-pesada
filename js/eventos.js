function BarraVertical(){
	var top = document.body.scrollTop;
	if(top>200){
		//flotar la barra
		document.getElementById("barra_maquinaria").className="flotar";
	}else{
		//volver meses a su posicion
		document.getElementById("barra_maquinaria").className="";
	}
}
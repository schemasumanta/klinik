$('#tipe_pengajuan').on('change',function(){
    var tipe_pengajuan = $(this).val();
	// var tipe_pengajuan = $(this).val();
	if (tipe_pengajuan=="Uang Jalan") { 
		$('.uangjalan').css('display','block');
		// $('#rincian_uangjalan').css('display','block'); 
	}
						 
	// } else if(tipe_pengajuan=="Kasbon" || tipe_pengajuan=="Upah Teknisi"){

	     

					

	// } else if(tipe_pengajuan=="Kordinasi / lain lain"){
	    

	// }else if(tipe_pengajuan=="Kuli"){
	    

	// }else if(tipe_pengajuan=="Tools"){
	     
	// }  

	})  

	 
	$('#kas').on('change',function(){ 
		var kas = $('#kas').val();  

		var html=''; 
		if (kas=="Besar"){
		    html+='<option value="Transfer" selected >Transfer</option>';
				$('#via').html(html); 
		   } else if(kas=="Kecil")
			html+='<option value="Cash" selected >Cash</option> <option value="Transfer" selected >Transfer</option>';
				$('#via').html(html); 
	   }) 


	$('#via').on('change',function(){ 
		var via = $('#via').val();   
		 
		if (via=="Cash"){ 
			document.getElementById('lbl_ket_rekening').style.display  ="none";
			document.getElementById('keterangan_rekening').style.display  ="none";
		   }else{
			document.getElementById('lbl_ket_rekening').style.display  ="block";
			document.getElementById('keterangan_rekening').style.display  ="block";
		   }
	   })   
	   
	function hitung() {  

		// UANG JALAN
		var uangjalan = parseInt(document.getElementById('bahan_bakar').value) + parseInt(document.getElementById('parkir').value)  + parseInt(document.getElementById('prj').value) +  parseInt(document.getElementById('keamanan').value) + parseInt(document.getElementById('tol').value) + parseInt(document.getElementById('transport').value) + parseInt(document.getElementById('lain_lain').value); 

		// UANG MAKAN DAN PENGINAPAN 
		var uangmakan =  parseInt(document.getElementById('uang_makan').value) * parseInt(document.getElementById('jumlah_hari_uang_makan').value);
		var uangpenginapan =  parseInt(document.getElementById('biaya_penginapan').value) * parseInt(document.getElementById('jumlah_hari_penginapan').value);

		// KASBON & PEMBAYARAN TEKNISI
		var uangkasbon =  parseInt(document.getElementById('nominal_kasbon').value);
		var uangteknisi =  parseInt(document.getElementById('nominal_pembayaran_teknisi').value);

		// UANG KOORDINASI LAIN -LAIN
		var uangkoordinasi =  parseInt(document.getElementById('nominal_pengajuan_koordinasi').value);

		// UANG KULI
		var uangkuli =  parseInt(document.getElementById('kuli').value);

		// UANG TOOLS
		var uangtools = parseInt(document.getElementById('tools').value);
 

		var tot_uangjalan = uangjalan;
		var sub_tot_uang_makan= uangmakan;
		var sub_tot_uang_penginapan= uangpenginapan;
		var tot_uangkasbon= uangkasbon;
		var tot_uangteknisi= uangteknisi;
		var tot_uangkoordinasi= uangkoordinasi;
		var tot_uangkuli= uangkuli; 
		var tot_uangtools= uangtools; 
		var kasbesar = uangjalan + uangmakan + uangpenginapan + uangkasbon + uangteknisi + uangkoordinasi + uangkuli + uangtools;
		var kaskecil = uangjalan + uangmakan + uangpenginapan + uangkasbon + uangteknisi + uangkoordinasi + uangkuli + uangtools;
		var tot_keseluruhan = uangjalan + uangmakan + uangpenginapan + uangkasbon + uangteknisi + uangkoordinasi + uangkuli + uangtools;
 

		// UANG JALAN
		document.getElementById('total_uang_jalan').value = tot_uangjalan;
		// UANG MAKAN
		document.getElementById('sub_total_uang_makan').value = sub_tot_uang_makan;
		document.getElementById('total_uang_makan').value = sub_tot_uang_makan;
		// UANG PENGINAPAN
		document.getElementById('sub_total_uang_penginapan').value = sub_tot_uang_penginapan;
		document.getElementById('total_uang_penginapan').value = sub_tot_uang_penginapan;
		// UANG KASBON & PEMBAYARAN TEKNISI
		document.getElementById('total_uang_kasbon').value = uangkasbon;
		document.getElementById('total_uang_teknisi').value = uangteknisi;
		// UANG KASBON 
		document.getElementById('total_pengajuan_koordinasi').value = uangkoordinasi;
		// UANG KULI 
		document.getElementById('total_uang_kuli').value = uangkuli;
		// UANG TOOLS 
		document.getElementById('total_uang_tools').value = uangtools;
		// TOTAL KAS BESAR
		document.getElementById('total_akhir_kas_besar').value = kasbesar;
		// TOTAL KAS KECIL
		document.getElementById('total_akhir_kas_kecil').value = kaskecil;
		// TOTAL KAS KESELURUHAN
		document.getElementById('total_akhir_keseluruhan').value = tot_keseluruhan;

		}

		function hitung_uang_makan(jumlah)
		{
			// var jumlah = $('[name=uang_makan[]]').length;
			alert(jumlah);
		}



		function hapusopdantujuan(tarikan){
			var kode = tarikan -1;
		
			var idhapus = document.getElementById("hapuslistopdantujuan"+kode);
			if (idhapus!=null) {
			
			idhapus.style.display="block";
			}
		
			var idtambah = document.getElementById("tambahlistopdantujuan"+kode);
			if (idtambah!=null) {
		
			idtambah.style.display="block";
			} 
		
			$('#opdantujuan'+tarikan).remove(); 
			} 
		
			function tambahopdantujuan(tarikan){
			var kodebaru = tarikan +1; 
		
			var str ='';
			str += '<div id="opdantujuan'+kodebaru+'">'+
														
			'<h5 type="button transparent" style="background: #1572e8;height: 30px; padding-top: 6px; color: white; "   data-toggle="collapse" id="btn_collapse'+kodebaru+'" href="#opdantujuan_collapse'+kodebaru+'" role="button" aria-expanded="false" aria-controls="customer_collapse"> <i class="ml-1 mr-3"></i><b> <h6 style="float: right; margin-right: 2px;">#'+kodebaru+'</h6> OP - TUJUAN </b></h5>'+
														
			'<div class="row" class="collapse" id="opdantujuan_collapse'+kodebaru+'">'+
		
			'<div class="col-md-6 mb-2">'+ 
			'<label>Nomor OP</label>'+ 
			'<input type="text" class="form-control" id="nomor_op'+kodebaru+'" name="nomor_op[]" placeholder="Nomor OP">'+
			'</div>'+
			'<div class="col-md-6 mb-2">'+ 
			'<label>Tujuan</label>'+ 
			' <input type="text" class="form-control" id="tujuan'+kodebaru+'" name="tujuan[]" placeholder="Tujuan">'+
			'</div>'+
		
			'<div class="col-md-12 mb-2">'+ 
			'<button id="tambahlistopdantujuan'+kodebaru+'" type="button" class="btn btn-sm btn-success float-right" onclick="tambahopdantujuan('+kodebaru+')">+</button>'+
			'<button id="hapuslistopdantujuan'+kodebaru+'" type="button" class="btn btn-sm btn-danger float-right mr-2"  onclick="hapusopdantujuan('+kodebaru+')">-</button>'+
			'</div>'+ 
			
			'</div>'+ 
		
			'</div>';
		
		
			var idhapus = document.getElementById("hapuslistopdantujuan"+tarikan);
			if (idhapus!=null) {
		
			idhapus.style.display="none";
			} 
			var idtambah = document.getElementById("tambahlistopdantujuan"+tarikan);
			if (idtambah!=null) {
		
			idtambah.style.display="none";
			}
		
			$('#opdantujuan'+tarikan).append(str);
		
			$('#btn_collapse'+tarikan).click(function(){
			$('.collapse').collapse('hide');
		
			});
		
		
		
			$('#btn_collapse'+tarikan).click();
		
			var data = $('#simpan_data_pengajuan').attr('isi');
		
			var databaru = parseFloat(data)+1;
			$('#simpan_data_pengajuan').attr('isi',databaru);			
			}  


											
		 

 

		 

 
			 

	 





		


 
<div class="container-fluid pt-2 pb-2">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Section</h1>
        <h1 class="h5 mb-0 text-gray-600"><?= $id_kuisioner;?></h1>
    </div>
    

<div class="row">
    <div class="col-xl-12 col-lg-12">
    <div class="  mb-2">
        
        <!-- Card Body -->
        <div class="">
        <form action="<?php echo base_url(). 'kuisioner/editSection'; ?>" method="POST">
        <?php foreach($section as $a){ ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nama Section</label>
                        <input name="nama_section" type="text" class="form-control" value="<?= $a->nama_section?>">
                    </div>
                    <div class="form-group">
                        <label>No Section</label>
                        <input name="no_section" type="text" class="form-control" value="<?= $a->no_section?>">
                        <input name="id_kuisioner" type="hidden" class="form-control" value="<?= $id_kuisioner?>">
                        <input name="id_section" type="hidden" class="form-control" value="<?= $a->id_section?>">
                    </div>
                </div>
                <hr>
                <div class="col-md-12 bg-disabled mb-2 card">
                <h5 class="h5 mb-2 text-gray-600 mt-2">Kondisi Section</h5>
                <p>Kondisi section digunakan untuk mengatur pertanyaan agar dapat ditampilkan berdasarkan jawaban responden dari pertanyaan  pada section sebelumnya</p>
                    <div class="form-group">
                        <label>Pilih Pertanyaan</label>
                        <select name="pertanyaan" id="pertanyaan"   class="custom-select custom-select-sm" style="min-width: 100px;">
                                <option value="" selected>Pilih Pertanyaan</option>
                                <?php foreach($pertanyaan as $u){ ?>
                                <option value="<?= $u->id_pertanyaan?>" ><?= $u->nama_pertanyaan?></option>
                                <?php } ?>
                        </select>  
                    </div>
                    <div class="form-group">
                        <label>Pilih Jawaban</label>
                        <select   name="id_fiter_by" id="singleSelectDD"  onchange="singleSelectChangeValue()" class="id_fiter_by custom-select custom-select-sm" style="min-width: 200px;">
                            <option value="" selected>Pilih </option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-fill btn-primary">Update Section</button>
        <?php } ?>
        </form>
        </div>
    </div>
    </div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$('#pertanyaan').change(function(){
			var id=$(this).val();
      

        $.ajax({
          url : "<?php echo base_url();?>/kuisioner/getOptionPilihanJawaban/"+id,
          method : "POST",
          data : {id: id},
          async : false,
              dataType : 'json',
          success: function(data){
            var html = '';
                  var i;
                  for(i=0; i<data.length; i++){
                      html += '<option value='+data[i].id_pilihan_jawaban+'>'+data[i].nama_pilihan_jawaban+'</option>';
                  }
                  $('.id_fiter_by').html(html);
          }
        });
      
		});
	});
</script>



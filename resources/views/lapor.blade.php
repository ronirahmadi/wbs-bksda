@extends('layouts.app')
@section('content')
<div class="contact">
    <div class="container">
        <div class="section-header">
            <h2>Form Laporan</h2>
        </div>
        <form action="{{ route('laporans.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
            <div class="row">
                
                <div class="col-md-6">
                    <div class="contact-form">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Judul:</strong>
                                    <input type="text" name="judul" class="form-control" placeholder="(Judul dari isi yang dilaporkan)">
                                    <p>Contoh : Transaksi Kulit Harimau Sumatra</p>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nama Pelapor:</strong>
                                    <input type="text" name="namapelapor" class="form-control" placeholder="(Gunakan nama samaran)">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    <input type="email" name="email" class="form-control" placeholder="(Boleh dikosongi / tidak diisi)">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="jenispelanggaran"><strong>Jenis Pelanggaran:</strong></label>
                                    <select name="jenispelanggaran" class="form-control">
                                       <option>--Pelanggaran--</option>
                                       <option value="penyimpangan dari tugas dan fungsi">Penyimpangan dari tugas dan fungsi</option>
                                       <option value="gratifikasi atau suap">Gratifikasi/Suap</option>
                                       <option value="benturan kepentingan">Benturan kepentingan</option>
                                       <option value="melanggar peraturan dan perundangan yang berlaku">Melanggar peraturan dan perundangan yang berlaku</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nama Terlapor:</strong>
                                    <input type="text" name="namaterlapor" class="form-control" placeholder="(Dapat diisi lebih dari satu nama)">
                                    <p>Jika tidak mengetahui identitas terlapor, tuliskan ciri-ciri pelaku</p>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Lokasi Kejadian:</strong>
                                    <input type="text" name="lokasi" class="form-control" placeholder="Detail nama tempat/alamat lengkap kejadian">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                 <label for="provinsi"><strong>Pilih Provinsi:</strong></label>
                                 <select name="provinsi" class="form-control">
                                    <option value="">--Provinsi--</option>
                                    @foreach ($provinsi as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           
                           <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                 <label for="kota"><strong>Pilih Kota/Kabupaten:</strong></label>
                                 <select name="kota" class="form-control">
                                 <option>--Kota/Kabupaten--</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <div class="row">
                           <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                 <label for="kecamatan"><strong>Pilih Kecamatan:</strong></label>
                                 <select name="kecamatan" class="form-control">
                                 <option>--Kecamatan--</option>
                                 </select>
                                 <p>Jika tidak mengetahui boleh dikosongi atau tidak diisi.</p>
                              </div>
                           </div>

                           <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                 <label for="kelurahan"><strong>Pilih Kelurahan:</strong></label>
                                 <select name="kelurahan" class="form-control">
                                 <option>--Kelurahan--</option>
                                 </select>
                                 <p>Jika tidak mengetahui boleh dikosongi atau tidak diisi.</p>
                              </div>    
                           </div>

                           <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                 <strong>Tanggal Kejadian:</strong>
                                 <input type="date" name="tanggal" class="form-control">
                              </div>
                           </div>

                           <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                 <strong>Waktu:</strong>
                                 <input type="text" name="waktu" class="form-control" placeholder="Detail waktu perkiraan kejadian">
                                 <p>Contoh : Hari senin sore, Minggu Pertama Januari 2021, Saat acara Pet Expo 2021.</p>
                              </div>
                           </div>

                           <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                              <strong>Uraian:</strong>
                                 <textarea class="form-control" style="height:150px" name="uraian" placeholder="Keterangan/Detail dari kejadian tersebut"></textarea>
                              </div>
                           </div>

                           <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                              <strong>Upload Bukti Anda</strong>
                                 <input type="file" name="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" >
                                 @if ($errors->has('file'))
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                 @endif
                                 <p style="color: red;">Catatan :</p>
                                 <P style="margin-top: -15px;">- Maksimal kapasitas file yang diperkenankan adalah sebesar 10MB.<br>- Tipe/format file yang diizinkan adalah .ZIP, .RAR, .DOC, .DOCX, .XLS, .XLSX, .PPT, .PPTX, .PDF, .JPG, .JPEG, .PNG, .MKV, .AVI, .MP4, .3GP, .MP3</P>
                              </div>
                           </div>
                           
                           <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                              <button type="submit" class="btn btn-primary">Kirim Laporan</button>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Dropdown Indonesia -->
<script type="text/javascript">
//kabupaten
jQuery(document).ready(function ()
{
         jQuery('select[name="provinsi"]').on('change',function(){
         var provinsiID = jQuery(this).val();
         if(provinsiID)
         {
            jQuery.ajax({
               url : 'lapor/getkota/' +provinsiID,
               type : "GET",
               dataType : "json",
               success:function(data)
               {
                     console.log(data);
                     jQuery('select[name="kota"]').empty();
                     jQuery.each(data, function(key,value){
                     $('select[name="kota"]').append('<option value="'+ key +'">'+ value +'</option>');
                     });
               }
            });
         }
         else
         {
            $('select[name="kota"]').empty();
         }
         });
});
//kecamatan
jQuery(document).ready(function ()
{
         jQuery('select[name="kota"]').on('change',function(){
         var kotaID = jQuery(this).val();
         if(kotaID)
         {
            jQuery.ajax({
               url : 'lapor/getkec/' +kotaID,
               type : "GET",
               dataType : "json",
               success:function(data)
               {
                     console.log(data);
                     jQuery('select[name="kecamatan"]').empty();
                     jQuery.each(data, function(key,value){
                     $('select[name="kecamatan"]').append('<option value="'+ key +'">'+ value +'</option>');
                     });
               }
            });
         }
         else
         {
            $('select[name="kecamatan"]').empty();
         }
         });
});
//kelurahan
jQuery(document).ready(function ()
{
         jQuery('select[name="kecamatan"]').on('change',function(){
         var kecamatanID = jQuery(this).val();
         if(kecamatanID)
         {
            jQuery.ajax({
               url : 'lapor/getdes/' +kecamatanID,
               type : "GET",
               dataType : "json",
               success:function(data)
               {
                     console.log(data);
                     jQuery('select[name="kelurahan"]').empty();
                     jQuery.each(data, function(key,value){
                     $('select[name="kelurahan"]').append('<option value="'+ key +'">'+ value +'</option>');
                     });
               }
            });
         }
         else
         {
            $('select[name="kelurahan"]').empty();
         }
         });
});
</script>
<!-- Dropdown Indonesia Selesai -->
@endsection


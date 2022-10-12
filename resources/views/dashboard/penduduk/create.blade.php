@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Penduduk Baru</h1>
</div>
<div class="box-header with-border">
    <a href="/dashboard/penduduk" class=" mt-3 btn btn-primary" title="Kembali Ke Data Penduduk"> <span data-feather="arrow-left"></span> Kembali Ke Daftar Penduduk</a>
</div>
<div class="col-md-9">
<form method="post" action="/dashboard/penduduk" class="mb-5">
    @csrf
        <div class="mb-3 col-sm-4 mt-3">
            <label for="tgl_lapor">Tanggal Lapor </label>
          <input type="date" class="form-control  @error('tgl_lapor') is-invalid @enderror" id="tgl_lapor" name="tgl_lapor" required autofocus value="{{ old('tgl_lapor') }}">

          @error('tgl_lapor')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
          @enderror
        </div>
        <div class='col-sm-12 mt-3'>
            <div class="form-group subtitle_head">
                <label class="text-right"><strong>DATA DIRI :</strong></label>
            </div>
        </div>
        <div class="row">
        <div class='col-sm-4'>
            <div class='form-group'>
                <label for="nik">NIK <code>(*)</code> </label>
                <input id="nik" name="nik" class="form-control input-sm required nik @error('nik') is-invalid @enderror" type="text" placeholder="Nomor NIK"
                value="{{ old('nik') }}">
                @error('nik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
        </div>
        <div class='col-sm-8'>
            <div class='form-group'>
                <label for="nama">Nama Lengkap <code> (Tanpa Gelar) </code> </label>
                <input id="nama" name="nama" class="form-control input-sm @error('nama') is-invalid @enderror" maxlength="100" type="text" placeholder="Nama Lengkap" value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        </div>

        <div class="row mt-3">
        <div class='col-sm-4'>
            <div class='form-group'>
                <label for="nokk">Nomor KK<code>(*)</code></label>
                <input id="nokk" name="nokk" class="form-control input-sm @error('nokk') is-invalid @enderror" maxlength="30" type="text" placeholder="No KK" value="{{ old('nokk') }}">
                @error('nokk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                 @enderror
            </div>
        </div>
        <div class='col-sm-4'>
            <div class='form-group'>
                <label for="statuskeluarga">Hubungan Dalam Keluarga<code>*</code></label>
                <select class="form-select input-sm required @error('statuskeluarga') is-invalid @enderror" name="statuskeluarga">
                    <option value="">Pilih Hubungan Keluarga</option>
                    <option value="KEPALA KELUARGA" <?= (old('statuskeluarga') == 'KEPALA KELUARGA') ? 'selected' : '' ?>>KEPALA KELUARGA</option>
                    <option value="SUAMI" <?= (old('statuskeluarga') == 'SUAMI') ? 'selected' : '' ?>>SUAMI</option>
                    <option value="ISTRI" <?= (old('statuskeluarga') == 'ISTRI') ? 'selected' : '' ?>>ISTRI</option>
                    <option value="ANAK" <?= (old('statuskeluarga') == 'ANAK') ? 'selected' : '' ?>>ANAK</option>
                    <option value="MENANTU"<?= (old('statuskeluarga') == 'MENANTU') ? 'selected' : '' ?>>MENANTU</option>
                    <option value="CUCU" <?= (old('statuskeluarga') == 'CUCU') ? 'selected' : '' ?>>CUCU</option>
                    <option value="ORANGTUA" <?= (old('statuskeluarga') == 'ORANGTUA') ? 'selected' : '' ?>>ORANGTUA</option>
                    <option value="MERTUA" <?= (old('statuskeluarga') == 'MERTUA') ? 'selected' : '' ?>>MERTUA</option>
                    <option value="FAMILI" <?= (old('statuskeluarga') == 'FAMILI') ? 'selected' : '' ?>>FAMILI</option>
                    <option value="PEMBANTU" <?= (old('statuskeluarga') == 'PEMBANTU') ? 'selected' : '' ?>>PEMBANTU</option>
                    <option value="LAINNYA" <?= (old('statuskeluarga') == 'LAINNYA') ? 'selected' : '' ?>>LAINNYA</option>
                </select>
                @error('statuskeluarga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                     @enderror
            </div>
        </div>
        </div>

        <div class="row mt-3">
        <div class='col-sm-3'>
            <div class='form-group'>
                <label for="jk">Jenis Kelamin<code>(*)</code></label>
                <select class="form-select input-sm @error('jk') is-invalid @enderror" name="jk" onchange="ubah_sex($(this).find(':selected').val());">
                    <option value="">Jenis Kelamin</option>
                    <option value="Laki-Laki" <?= (old('jk') == 'Laki-Laki') ? 'selected' : '' ?>>Laki-Laki</option>
                    <option value="Perempuan" <?= (old('jk') == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                </select>
                @error('jk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class='col-sm-3'>
            <div class='form-group'>
                <label for="agama">Agama<code>(*)</code></label>
                <select class="form-select input-sm @error('agama') is-invalid @enderror" name="agama">
                    <option value="">Pilih Agama</option>
                    <option value="ISLAM" <?= (old('jk') == 'ISLAM') ? 'selected' : '' ?>>ISLAM</option>
                    <option value="KRISTEN" <?= (old('jk') == 'KRISTEN') ? 'selected' : '' ?>>KRISTEN</option>
                    <option value="KATHOLIK" <?= (old('jk') == 'KATHOLIK') ? 'selected' : '' ?>>KATHOLIK</option>
                    <option value="HINDU" <?= (old('jk') == 'HINDU') ? 'selected' : '' ?>>HINDU</option>
                    <option value="BUDHA" <?= (old('jk') == 'BUDHA') ? 'selected' : '' ?>>BUDHA</option>
                    <option value="KHONGHUCU" <?= (old('jk') == 'KHONGHUCU') ? 'selected' : '' ?>>KHONGHUCU</option>
            </select>
            @error('agama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
        </div>

        <div class='col-sm-3'>
            <div class='form-group'>
                <label for="statuspenduduk">Status Penduduk <code>(*)</code></label>
                <select class="form-select input-sm required @error('statuspenduduk') is-invalid @enderror" id="statuspenduduk" name="statuspenduduk" onchange="show_hide_penduduk_tidak_tetap($(this).find(':selected').val())" >
                    <option value="">Pilih Status</option>
                    <option value="1" >TETAP</option>
                    <option value="2" >TIDAK TETAP</option>
                </select>
                @error('statuspenduduk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        </div>

        <div id="section_penduduk_tidak_tetap">
            <div class='col-sm-12 mt-3'>
                <div class="form-group subtitle_head">
                    <label class="text-right"><strong>DATA PENDUDUK TIDAK TETAP :</strong></label>
                </div>
            </div>
            <div class='col-sm-8'>
                <div class='form-group'>
                <label for="maksud_tujuan_kedatangan">Maksud dan Tujuan Kedatangan</label>
                    <textarea id="maksud_tujuan_kedatangan" name="maksud_tujuan_kedatangan" class="form-control input-sm" style="resize: none" placeholder="tuliskan ..."
                    value="{{ old('maksud_tujuan_kedatangan') }}"></textarea>
                </div>
            </div>
        </div>

        <div class='col-sm-12 mt-3'>
            <div class="form-group subtitle_head">
                <label class="text-right"><strong>DATA KELAHIRAN :</strong></label>
            </div>
        </div>
        <div class='col-sm-4'>
            <div class='form-group'>
                <label for="nomorakta">Nomor Akta Kelahiran </label>
                <input id="nomorakta" name="nomorakta" class="form-control input-sm @error('nomorakta') is-invalid @enderror" type="text" maxlength="40" placeholder="Nomor Akta Kelahiran" value="{{ old('nomorakta') }}">
                @error('nomorakta')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                 @enderror
            </div>
        </div>

        <div class="row mt-3">
        <div class='col-sm-3'>
            <div class='form-group'>
                <label for="tempatlahir">Tempat Lahir<code>(*)</code></label>
                <input id="tempatlahir" name="tempatlahir" class="form-control input-sm required @error('tempatlahir') is-invalid @enderror" maxlength="100" type="text" placeholder="Tempat Lahir" value="{{ old('tempatlahir') }}">
                @error('tempatlahir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                 @enderror
            </div>
        </div>
        <div class='col-sm-3'>
            <div class='form-group'>
                <label for="tanggallahir">Tanggal Lahir<code>(*)</code></label>
                <div class="input-group input-group-sm date">

                    <input class="form-control input-sm pull-right required @error('tanggallahir') is-invalid @enderror" id="tgl_1" name="tanggallahir" type="date" value="{{ old('tanggallahir') }}">
                    @error('tanggallahir')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class='col-sm-3'>
            <div class='form-group'>
                <label for="waktulahir">Waktu Kelahiran </label>
                <div class="input-group input-group-sm date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input class="form-control input-sm pull-right @error('waktulahir') is-invalid @enderror" id="waktulahir" name="waktulahir" type="time" value="{{ old('waktulahir') }}">
                    @error('waktulahir')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        </div>
        <div class='col-sm-4'>
            <div class='form-group'>
                <label for="tempatdilahirkan">Tempat Dilahirkan</label>
                <select class="form-select input-sm @error('tempatdilahirkan') is-invalid @enderror" name="tempatdilahirkan">
                    <option value="">Pilih Tempat Dilahirkan</option>
                    <option value="1" >RS/RB</option>
                    <option value="2" >PUSKEMAS</option>
                    <option value="3" >POLINDES</option>
                    <option value="4" >RUMAH</option>
                    <option value="5" >LAINNYA</option>
            </select>
            @error('tempatdilahirkan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            </div>
        </div>

        <div class='row'>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="kelahiran_anak_ke">Anak Ke <code>(Isi dengan angka)</code></label>
                    <input id="kelahiran_anak_ke" name="kelahiran_anak_ke" class="form-control input-sm number @error('kelahiran_anak_ke') is-invalid @enderror" maxlength="2" type="text" placeholder="Anak Ke" value="{{ old('kelahiran_anak_ke') }}">
                    @error('kelahiran_anak_ke')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="penolong_kelahiran">Penolong Kelahiran</label>
                    <select class="form-select input-sm @error('penolong_kelahiran') is-invalid  @enderror" name="penolong_kelahiran">
                        <option value="">Pilih Penolong Kelahiran</option>
                        <option value="Dokter" >DOKTER</option>
                        <option value="Bidan" >BIDAN PERAWAT</option>
                        <option value="Dukun" >DUKUN</option>
                        <option value="Lainnya" >LAINNYA</option>
                        {{ old("penolong_kelahiran") }}
                </select>
                @error('penolong_kelahiran')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
            </div>
            <div class='row'>
                <div class='col-sm-4'>
                    <div class='form-group'>
                        <label for="beratLahir">Berat Lahir <code>( Gram )</code></label>
                        <input id="beratLahir" name="beratLahir" class="form-control input-sm number" maxlength="6" type="text" placeholder="Berat Lahir" value="">
                    </div>
                </div>
                <div class='col-sm-4'>
                    <div class='form-group'>
                        <label for="panjangLahir">Panjang Lahir <code>( cm )</code></label>
                        <input id="panjangLahir" name="panjangLahir" class="form-control input-sm number" maxlength="3" type="text" placeholder="Panjang Lahir" value="">
                    </div>
                </div>
            </div>
        </div>
        <div>
        <div class='col-sm-12 mt-3'>
            <div class="form-group subtitle_head">
                <label class="text-right"><strong>PENDIDIKAN DAN PEKERJAAN :</strong></label>
            </div>
        </div>
        <div class='col-sm-4'>
            <div class='form-group'>
                <label for="pendidikan">Pendidikan Dalam KK <code>(*)</code></label>
                <select class="form-select input-sm required @error('pendidikan') is-invalid
                @enderror" name="pendidikan">
                    <option value="">Pilih Pendidikan (Dalam KK) </option>
                    <option value="Belum Sekolah" >TIDAK / BELUM SEKOLAH</option>
                    <option value="Belum Tamat SD" >BELUM TAMAT SD/SEDERAJAT</option>
                    <option value="Tamat SD" >TAMAT SD / SEDERAJAT</option>
                    <option value="SMP" >SMP/SEDERAJAT</option>
                    <option value="SMA" >SMA / SEDERAJAT</option>
                    <option value="D1/2" >DIPLOMA I / II</option>
                    <option value="D3" >AKADEMI/ DIPLOMA III/S. MUDA</option>
                    <option value="S1" >DIPLOMA IV/ STRATA I</option>
                    <option value="S2" >STRATA II</option>
                    <option value="S3" >STRATA III</option>
            </select>

            @error('pendidikan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
        </div>

        <div class='col-sm-4'>
                <label for="pekerjaan">Pekerjaaan<code>(*)</code></label>
                <select class="form-select input-sm required @error('pekerjaan') is-invalid @enderror" name="pekerjaan">
                    <option value="">Pilih Pekerjaan</option>
                                                    <option value="Tidak Bekerja" >BELUM/TIDAK BEKERJA</option>
                                                    <option value="Ibu Rumah Tangga" >MENGURUS RUMAH TANGGA</option>
                                                    <option value="PELAJAR/MAHASISWA" >PELAJAR/MAHASISWA</option>
                                                    <option value="PENSIUNAN" >PENSIUNAN</option>
                                                    <option value="PNS" >PEGAWAI NEGERI SIPIL (PNS)</option>
                                                    <option value="TNI" >TENTARA NASIONAL INDONESIA (TNI)</option>
                                                    <option value="POLRI" >KEPOLISIAN RI (POLRI)</option>
                                                    <option value="PERDAGANGAN" >PERDAGANGAN</option>
                                                    <option value="PETANI/PEKEBUN" >PETANI/PEKEBUN</option>
                                                    <option value="PETERNAK" >PETERNAK</option>
                                                    <option value="NELAYAN/PERIKANAN" >NELAYAN/PERIKANAN</option>
                                                    <option value="INDUSTRI" >INDUSTRI</option>
                                                    <option value="KONSTRUKSI" >KONSTRUKSI</option>
                                                    <option value="TRANSPORTASI" >TRANSPORTASI</option>
                                                    <option value="KARYAWAN SWASTA" >KARYAWAN SWASTA</option>
                                                    <option value="KARYAWAN BUMN" >KARYAWAN BUMN</option>
                                                    <option value="KARYAWAN BUMD" >KARYAWAN BUMD</option>
                                                    <option value="KARYAWAN HONORER" >KARYAWAN HONORER</option>
                                                    <option value="BURUH HARIAN LEPAS" >BURUH HARIAN LEPAS</option>
                                                    <option value="BURUH TANI/PERKEBUNAN" >BURUH TANI/PERKEBUNAN</option>
                                                    <option value="BURUH NELAYAN/PERIKANAN" >BURUH NELAYAN/PERIKANAN</option>
                                                    <option value="BURUH PETERNAKAN" >BURUH PETERNAKAN</option>
                                                    <option value="PEMBANTU RUMAH TANGGA" >PEMBANTU RUMAH TANGGA</option>
                                                    <option value="TUKANG CUKUR" >TUKANG CUKUR</option>
                                                    <option value="TUKANG LISTRIK" >TUKANG LISTRIK</option>
                                                    <option value="TUKANG BATU" >TUKANG BATU</option>
                                                    <option value="TUKANG KAYU" >TUKANG KAYU</option>
                                                    <option value="TUKANG SOL SEPATU" >TUKANG SOL SEPATU</option>
                                                    <option value="TUKANG LAS/PANDAI BESI" >TUKANG LAS/PANDAI BESI</option>
                                                    <option value="TUKANG JAHIT" >TUKANG JAHIT</option>
                                                    <option value="TUKANG GIGI" >TUKANG GIGI</option>
                                                    <option value="PENATA RIAS" >PENATA RIAS</option>
                                                    <option value="PENATA BUSANA" >PENATA BUSANA</option>
                                                    <option value="PENATA RAMBUT" >PENATA RAMBUT</option>
                                                    <option value="MEKANIK" >MEKANIK</option>
                                                    <option value="SENIMAN" >SENIMAN</option>
                                                    <option value="TABIB" >TABIB</option>
                                                    <option value="PARAJI" >PARAJI</option>
                                                    <option value="PERANCANG BUSANA" >PERANCANG BUSANA</option>
                                                    <option value="PENTERJEMAH" >PENTERJEMAH</option>
                                                    <option value="WARTAWAN" >WARTAWAN</option>
                                                    <option value="JURU MASAK" >JURU MASAK</option>
                                                    <option value="Lainnya" >LAINNYA</option>
                </select>
                @error("pekerjaan")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

                <div class='col-sm-12 mt-3'>
					<div class="form-group subtitle_head">
						<label class="text-right"><strong>DATA KEWARGANEGARAAN :</strong></label>
					</div>
				</div>
                <div class="row">
                <div class='col-sm-4'>
					<div class='form-group'>
						<label for="kewarganegaraan">Status Warga Negara<code>(*)</code></label>
						<select class="form-select input-sm required @error("kewarganegaraan") is-invalid

                        @enderror" id="kewarganegaraan" name="kewarganegaraan" onchange="show_hide_negara_asal($(this).find(':selected').val())">
							<option value="">Pilih Warga Negara</option>
							<option value="1" >WNI</option>
							<option value="2" >WNA</option>
							<option value="3" >DUA KEWARGANEGARAAN</option>
					    </select>
                        @error("pekerjaan")
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
				    </div>
                </div>
                <div class='col-sm-4' id='field_negara_asal'>
					<div class='form-group'>
						<label for="negara_asal">Negara Asal</label>
						<input id="negara_asal" name="negara_asal" class="form-control input-sm @error('negara_asal') is-invalid @enderror" maxlength="10" type="text" placeholder="Negara Asal" value="{{ old('negara_asal') }}">
                        @error("negara_asal")
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
					</div>
				</div>
                </div>

                <div class='col-sm-12 mt-3'>
					<div class="form-group subtitle_head">
						<label class="text-right"><strong>DATA ORANG TUA :</strong></label>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="row">
						<div class='col-sm-4'>
							<div class='form-group'>
								<label for="nikAyah"> NIK Ayah <code>(*)</code></label>
								<input id="nikAyah" name="nikAyah" class="form-control input-sm nik @error('nikAyah') is-invalid @enderror" type="text" placeholder="Nomor NIK Ayah" value="{{ old('nikAyah') }}">

                                @error("nikAyah")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                     </div>
                                @enderror
							</div>
						</div>
						<div class='col-sm-6'>
							<div class='form-group'>
								<label for="namaAyah">Nama Ayah<code>(*)</code> </label>
								<input id="namaAyah" name="namaAyah" class="form-control input-sm required nama @error('namaAyah') is-invalid @enderror" maxlength="100" type="text" placeholder="Nama Ayah" value="{{ old('namaAyah') }}">
                                @error("namaAyah")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
							</div>
						</div>
					</div>
                    <div class="row mt-3">
						<div class='col-sm-4'>
							<div class='form-group'>
								<label for="nikIbu"> NIK Ibu <code>(*)</code></label>
								<input id="nikIbu" name="nikIbu" class="form-control input-sm nik @error('nikIbu') is-invalid @enderror" type="text" placeholder="Nomor NIK Ibu" value="{{ old('nikIbu') }}">

                                @error("nikIbu")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                     </div>
                                @enderror
							</div>
						</div>
						<div class='col-sm-6'>
							<div class='form-group'>
								<label for="namaIbu">Nama Ibu<code>(*)</code> </label>
								<input id="namaIbu" name="namaIbu" class="form-control input-sm required nama @error('namaIbu') is-invalid @enderror" maxlength="100" type="text" placeholder="Nama Ibu" value="{{ old('namaIbu') }}">
                                @error("namaIbu")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
							</div>
						</div>
					</div>
		</div>
        <div class='col-sm-12 mt-4'>
            <div class="form-group subtitle_head">
                <label class="text-right"><strong>ALAMAT :</strong></label>
            </div>
        </div>
        <div class='form-group col-sm-3'>
            <label for="dusun">Dusun<code>(*)</code> </label>
            <select id="dusun" name="dusun" class="form-select input-sm required @error('dusun') is-invalid @enderror">
                <option value="">Pilih Dusun</option>
                <option value="ARCOPODO" >Arcopodo</option>
                <option value="GONDANG" >Gondang</option>
                <option value="TAMANAN" >Tamanan</option>
                <option value="KAJANG1" >Kajang 1</option>
                <option value="KAJANG2" >Kajang 2</option>
                <option value="KEPULUNGAN1" >Kepulungan 1</option>
                <option value="KEPULUNGAN2" >Kepulungan 2</option>
                <option value="DAMEAN" >Damean</option>
                <option value="BETAS" >Betas</option>
                <option value="KABUNAN" >Kabunan</option>
                <option value="TUGUSARI" >Tugusari</option>
            </select>
            @error('dusun')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="row">
            <div class='col-sm-3 mt-2'>
                <div class='form-group'>
                    <label for="rw">RW<code>(*)</code> </label>
                    <input id="rw" name="rw" class="form-control input-sm required rw @error('rw') is-invalid @enderror" maxlength="100" type="text" placeholder="RW" value="{{ old('rw') }}">
                    @error('rw')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class='col-sm-3 mt-2'>
                <div class='form-group'>
                    <label for="rt">RT<code>(*)</code> </label>
                    <input id="rt" name="rt" class="form-control input-sm required rt @error('rt') is-invalid @enderror" maxlength="100" type="text" placeholder="RT" value="{{ old('rt') }}">
                    @error('rt')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class='col-sm-8 mt-2'>
            <div class='form-group'>
                <label for="email"> Alamat Email<code>(*)</code> </label>
                <input id="email" name="email" class="form-control input-sm email @error('email') is-invalid @enderror" maxlength="50" placeholder="Alamat Email" size="20" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class='col-sm-8 mt-2'>
            <div class='form-group'>
                <label for="alamat_sekarang">Alamat Sekarang <code>(*)</code></label>
                <input id="alamat_sekarang" name="alamat_sekarang" class="form-control input-sm @error('alamat_sekarang') is-invalid @enderror" maxlength="200" type="text" placeholder="Alamat Sekarang" value="{{ old('alamat_sekarang') }}">
                @error('alamat_sekarang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class='col-sm-12 mt-4'>
            <div class="form-group subtitle_head">
                <label class="text-right"><strong>STATUS PERKAWINAN :</strong></label>
            </div>
        </div>
        <div class='col-sm-4'>
            <div class='form-group'>
                <label for="statuskawin">Status Perkawinan<code>(*)</code></label>
                <select class="form-select input-sm required @error('statuskawin') is-invalid @enderror" name="statuskawin" onchange="disable_kawin_cerai($(this).find(':selected').val())">
                    <option value="">Pilih Status Perkawinan</option>
                        <option value="1" >BELUM KAWIN</option>
                        <option value="2" >KAWIN</option>
                        <option value="3" >CERAI HIDUP</option>
                        <option value="4" >CERAI MATI</option>
                </select>
                @error('statuskawin')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
        <div class='col-sm-4'>
            <div class='form-group'>
                <label for="noaktanikah">No. Akta Nikah (Buku Nikah)/Perkawinan</label>
                <input id="noaktanikah" name="noaktanikah" class="form-control input-sm nomor_sk @error('noaktanikah') is-invalid @enderror" type="text" maxlength="40" placeholder="Nomor Akta Perkawinan" value="{{ old('noaktanikah') }}">
                @error('noaktanikah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class='col-sm-5'>
            <div class='form-group'>
                <label for="tanggalperkawinan">Tanggal Perkawinan <code>(Wajib diisi apabila status KAWIN)</code></label>
                <div class="input-group input-group-sm date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input class="form-control input-sm pull-right @error('tanggalperkawinan') is-invalid @enderror" id="tgl_3" name="tanggalperkawinan" type="date" value="{{ old('tanggalperkawinan') }}">
                    @error('tanggalperkawinan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        </div>
        <div class="row mt-3">
        <div class='col-sm-4'>
            <div class='form-group'>
                <label for="akta_perceraian">Akta Perceraian </label>
                <input id="akta_perceraian" name="akta_perceraian" class="form-control input-sm nomor_sk @error('akta_perceraian') is-invalid @enderror" maxlength="40" type="text" placeholder="Akta Perceraian" value="{{ old('akta_perceraian') }}">
                @error('akta_perceraian')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class='col-sm-5'>
            <div class='form-group'>
                <label for="tanggalperceraian">Tanggal Perceraian <code>(Wajib diisi apabila status CERAI)</code></label>
                <div class="input-group input-group-sm date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input class="form-control input-sm pull-right @error('tanggalperceraian') is-invalid @enderror" id="tgl_4" name="tanggalperceraian" type="date" value="{{ old('tanggalperceraian') }}">
                    @error('tanggalperceraian')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        </div>

        <div class='col-sm-12 mt-4'>
            <div class="form-group subtitle_head">
                <label class="text-right"><strong>DATA KESEHATAN :</strong></label>
            </div>
        </div>
        <div class='col-sm-12'>
            <div class="row">
                <div class='col-sm-3'>
                    <div class='form-group'>
                        <label for="goldarah">Golongan Darah</label>
                        <select class="form-select input-sm required" name="goldarah">
                            <option value="">Pilih Golongan Darah</option>
                            <option value="1" >A</option>
                            <option value="2" >B</option>
                            <option value="3" >AB</option>
                            <option value="4" >O</option>
                            <option value="5" >A+</option>
                            <option value="6" >A-</option>
                            <option value="7" >B+</option>
                            <option value="8" >B-</option>
                            <option value="9" >AB+</option>
                            <option value="10" >AB-</option>
                            <option value="11" >O+</option>
                            <option value="12" >O-</option>
                            <option value="13" >TIDAK TAHU</option>
                        </select>
                    </div>
                </div>
                <div class='col-sm-3'>
                    <div class='form-group'>
                        <label for="cacat">Cacat</label>
                        <select class="form-select input-sm" name="cacat" >
                            <option value="">Pilih Jenis Cacat</option>
                            <option value="1" >CACAT FISIK</option>
                            <option value="2" >CACAT NETRA/BUTA</option>
                            <option value="3" >CACAT RUNGU/WICARA</option>
                            <option value="4" >CACAT MENTAL/JIWA</option>
                            <option value="5" >CACAT FISIK DAN MENTAL</option>
                            <option value="6" >CACAT LAINNYA</option>
                            <option value="7" >TIDAK CACAT</option>
                        </select>
                    </div>

                </div>
                <div class='col-sm-3'>
                    <div class='form-group'>
                        <label for="sakitmenahun">Sakit Menahun</label>
                        <select class="form-select input-sm" name="sakitmenahun">
                            <option value="">Pilih Sakit Menahun</option>
                            <option value="1" >JANTUNG</option>
                            <option value="2" >LEVER</option>
                            <option value="3" >PARU-PARU</option>
                            <option value="4" >KANKER</option>
                            <option value="5" >STROKE</option>
                            <option value="6" >DIABETES MELITUS</option>
                            <option value="7" >GINJAL</option>
                            <option value="8" >MALARIA</option>
                            <option value="9" >LEPRA/KUSTA</option>
                            <option value="10" >HIV/AIDS</option>
                            <option value="11" >GILA/STRESS</option>
                            <option value="12" >TBC</option>
                            <option value="13" >ASTHMA</option>
                            <option value="14" >TIDAK ADA/TIDAK SAKIT</option>
                    </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
        <div class='col-sm-3' id="akseptor_kb">
            <div class='form-group'>
                <label for="cara_kb_id">Akseptor KB</label>
                <select class="form-select input-sm" name="akseptorKB" >
                    <option value="">Pilih Cara KB Saat Ini</option>
                    <option value="1" >PIL</option>
                    <option value="2" >IUD</option>
                    <option value="3" >SUNTIK</option>
                    <option value="4" >KONDOM</option>
                    <option value="5" >SUSUK KB</option>
                    <option value="6" >STERILISASI WANITA</option>
                    <option value="7" >STERILISASI PRIA</option>
                    <option value="99" >LAINNYA</option>
                </select>
            </div>
        </div>

        <div class='col-sm-3'>
            <div class='form-group'>
                <label for="asuransi">Asuransi </label>
                <select class="form-select input-sm" name="asuransi" onchange="show_hide_asuransi($(this).find(':selected').val());">
                    <option value="">Pilih Asuransi</option>
                    <option value="1" >TIDAK/BELUM PUNYA</option>
                    <option value="2" >BPJS PENERIMA BANTUAN IURAN</option>
                    <option value="3" >BPJS NON PENERIMA BANTUAN IURAN</option>
                    <option value="99" >ASURANSI LAINNYA</option>
                </select>
            </div>
        </div>
        </div>


        </div>
        <button type="submit" class="btn btn-primary mt-3">Create Post</button>
</form>
</div>

<script>
    	function show_hide_kewarganegaraan(status)
	    {
            // status 1 = TETAP, 2 = TIDAK TETAP
            if (status == 2)
            {
                $('#section_kewarganegaraan').fadeIn();
            }
            else
            {
                $('#section_kewarganegaraan').fadeOut();
		    }
        }
    	function show_hide_penduduk_tidak_tetap(status)
	    {
            // status 1 = TETAP, 2 = TIDAK TETAP
            if (status == 2)
            {
                $('#section_penduduk_tidak_tetap').fadeIn();
            }
            else
            {
                $('#section_penduduk_tidak_tetap').fadeOut();
		    }
        }
</script>
@endsection

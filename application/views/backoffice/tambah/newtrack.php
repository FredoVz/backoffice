<div class="container-fluid mt-5">
    <div class="row" style="margin-top: 5rem !important;">

        <div class="flash-data" data-flashdata='<?= json_encode($this->session->flashdata('message')); ?>'></div>

        <div class="col-xl-12 col-lg-12 col-md-12">
			<div class="row">
				<div class="col-lg-12 text-left">
					<a name="button" class="btn mb-1 btn-dark text-light text-light align-item-center" href="<?= base_url('tambah/track') ?>">
						<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAkklEQVR4nO3SMQ4BQRSA4a109GqNQiiV7uAAm9BrFTqF3iHUonMEiUu4g0Yk4hOJYYmCzFDtV07xZ97My7LSz6CNTqpYjgOWKWJTD6vY2MyzDXpooY7KN7GRz+yxwxZrLDBHrRi73uIkzrAY7OIYGcxfRx5Ejlx9946TZJ8SYIxzkrUJ0L+NFr/YARpo3g9Kf3MBdiiOTCVGCC4AAAAASUVORK5CYII=" alt="long-arrow-left">
						Back
					</a>
				</div>
			</div>
		</div>
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('tambah/inserttrack'); ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="iduserSelect">Pilih User:</label>
                                <select id="iduserSelect" name="userSelect" class="form-control">
                                    <?php foreach ($arrayUser as $user): ?>
                                    <option value="<?= $user['KodeUser']; ?>"><?= $user['YoutubeChannelNama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <br>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control wajib_input" id="idtitle" name="Title" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                <label for="isrc">ISRC</label>
                                <input type="text" class="form-control" id="idisrc" name="ISRC" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                <label for="tb-fname">Author</label>
                                <input type="text" class="form-control wajib_input" id="idauthor" name="Author" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                <label for="tb-fname">P Line</label>
                                <input type="text" class="form-control wajib_input" id="idpline" name="PLine" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                <label for="tb-fname">Composer</label>
                                <input type="text" class="form-control wajib_input" id="idcomposer" name="Composer" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                <label for="tb-fname">C Line</label>
                                <input type="text" class="form-control wajib_input" id="idcline" name="CLine" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                <label for="tb-fname">Choose Genre</label>
                                <select class="js-example-basic-multiple js-states form-control" id="select2-data-array" name="Genre"></select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                <label for="tb-fname">Create New Genre</label>
                                <input type="text" class="form-control" id="idgenre" name="NewGenre" placeholder="Klik for new genre" value="" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="">
                                    <!-- </?php echo $Track ?> -->
                                    <label for="tb-fname">Upload Track <span style='color:red;'>(*max 200mb)</span></label>
                                    <!-- <input type="file" class="form-control wajib_input" id="idtrack" name="fileinput" placeholder="Upload Track" value=""> -->
                                    <button  class="form-control" id="uppyModalOpener">Choose File</button>
                                    <input type="text" id="idfiletusd" name="filetusd" value="" style="display:none">
                                    <!-- <div id="drag-drop-area"></div> -->
                                    <!-- <input type="fille" class="form-control" id="idfoto" name="fileeinput"> -->
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                <label for="tb-fname">Production Date</label>
                                <input type="date" class="form-control wajib_input" id="idproddate" name="TanggalProduksi" value="">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form mb-3">
                                <label for="tb-fname">Type Song</label>
                                <input type="radio" class="btn-check " name="radtypesong" id="idradtypesongo" value="0" autocomplete="off" >
                                <label class="btn btn-outline-dark btn w-100" for="idradtypesongo">Original Song</label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form mb-3">
                                <label for="tb-fname"></label>
                                <input type="radio" class="btn-check" name="radtypesong" id="idradtypesongc" value="1" autocomplete="off" >
                                <label class="btn btn-outline-dark  btn w-100" for="idradtypesongc">Cover Song</label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-floating mb-3">
                                <label for="tb-fname">Artist Name</label>
                                <input type="text" class="form-control wajib_input" id="idartis" name="artis1" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-floating mb-3">
                                    <label for="tb-fname">Category Artist</label>
                                    <select class="form-select col-12" id="idselart" name="selart1">
                                        <option value="Primary Artist" selected>Primary Artist</option>
                                        <option value="Featuring Artist">Featuring Artist</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="">
                                <label for="tb-fname">Cover song permit document (.PDF) *Optional</label>
                                <input type="file" class="form-control" id="idtrack" name="fileinput1" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-floating mb-3">
                                <label for="tb-fname">Spotify ID (Optional)</label>
                                <input type="text" class="form-control" id="idspotify" name="spotify1" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-floating mb-3">
                                <label for="tb-fname">iTunes ID (Optional)</label>
                                <input type="text" class="form-control" id="iditune" name="itune1" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row" id="new_chq">
                                        </div>
                                        <!-- <div class="form-floating mb-3" id="new_chq"></div> -->
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="idaddsartis" name="addsartis1" placeholder="" disabled>
                                        <label for="tb-fname">Add Additional Artis</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <button type="button" class="btn bg-info-subtle text-info mb-2 w-100" data-bs-toggle="button" data-more="#sh" aria-pressed="false" style="height:78%" onclick="add()">
                                        <i class="ti ti-plus fs-7 text"></i>
                                        </button>
                                        <input type="hidden" value="1" id="total_chq" name="total_chq" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                <div class="col-lg-12">
                                    <div class="input-group mb-3">
                                    <div class="input-group-text" style="background-color:white;">
                                        <div class="form-check mr-sm-2">
                                                                    
                                        <input type="checkbox" class="form-check-input" id="idcb" name="cb" value="0" >
                                        <label class="form-check-label" for="checkbox3"></label>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" value="Explicit" readonly>
                                    </div>
                                </div>
                                    <div class="col-lg-12">
                                    <div class="form-floating mb-3">
                                        <select class="form-select col-12" id="idselleng" name="selleng">
                                            <option value="English" selected>English</option>
                                            <option value="Indonesia">Indonesia</option>
                                        </select>
                                        <label for="tb-fname">Track Title Language</label>
                                    </div>
                                    </div>
                                    <div class="col-lg-12">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control wajib_input" id="idstart" name="start" placeholder="" value="0">
                                        <label for="tb-fname">Preview Start (Example: 20 Second)</label>
                                    </div>
                                    </div>
                                    <div class="col-lg-12">
                                    <div class="form-floating mb-3">
                                        <input type="time" class="form-control wajib_input" id="idtime" name="time" placeholder="" value="">
                                        <label for="tb-fname">Duration <strong></strong> </label>
                                    </div>
                                    </div>
                                    <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <textarea class="form-control wajib_input" rows="7" placeholder="Lyrics..." name="lyric" id="idlyric"></textarea>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-md-flex align-items-center">
                                    <div class="ms-auto mt-3 mt-md-0">
                                        <button class="btn btn-primary">Submit</button>
                                        <!-- </form> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>     
            </div>
        </div>
        <div class="col-lg-6">
        </div>
    </div>
    <div class="py-6 px-6 text-center">
        <p class="mb-0 fs-4">Design and Developed by <a href="https://omegasoft.co.id/" target="_blank" class="pe-1 text-primary text-decoration-underline">omegasoft.co.id</a></p>
    </div>
</div>

<script type="text/javascript">
  console.log('[{"RefPelanggan":"0000J\/01\/000040","YoutubeChannelName":"Albert Official"},{"RefPelanggan":"0000J\/01\/00003N","YoutubeChannelName":"excello"},{"RefPelanggan":"0000J\/01\/00003Z","YoutubeChannelName":"excelloX"},{"RefPelanggan":"0000J\/01\/000057","YoutubeChannelName":"Fredo"},{"RefPelanggan":"0000J\/01\/00003V","YoutubeChannelName":"Jesus Center Church (JCC) Cijantung"},{"RefPelanggan":"0000J\/01\/00003X","YoutubeChannelName":"Jesus Center Church (JCC) Cijantung"},{"RefPelanggan":"0000J\/01\/00003Q","YoutubeChannelName":"melithatricia"},{"RefPelanggan":"0000J\/01\/00003T","YoutubeChannelName":"tesyt1"},{"RefPelanggan":"0000J\/01\/00003U","YoutubeChannelName":"Vidi Official"},{"RefPelanggan":"0000J\/01\/00003S","YoutubeChannelName":"Vidi Official"},{"RefPelanggan":"0000J\/01\/00003L","YoutubeChannelName":"YTChannelName"}]');
  const element = document.getElementById('iduserSelect');
  const choices = new Choices(element, {
    searchEnabled: true,
    itemSelectText: 'Pilih',
  });
</script>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 align-item-strech" style="margin-top:10%">
			<div class="row">
				<div class="col-lg-12 text-left">
					<a name="button" class="btn mb-1 btn-dark text-light text-light align-item-center" href="<?= base_url('tambah/track') ?>">
						<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAkklEQVR4nO3SMQ4BQRSA4a109GqNQiiV7uAAm9BrFTqF3iHUonMEiUu4g0Yk4hOJYYmCzFDtV07xZ97My7LSz6CNTqpYjgOWKWJTD6vY2MyzDXpooY7KN7GRz+yxwxZrLDBHrRi73uIkzrAY7OIYGcxfRx5Ejlx9946TZJ8SYIxzkrUJ0L+NFr/YARpo3g9Kf3MBdiiOTCVGCC4AAAAASUVORK5CYII=" alt="long-arrow-left">
						Back
					</a>
				</div>
			</div>
		</div>
		<div class="col-lg-12 align-item-strech">
			<div class="card">
				<div class="card-body">
					<form action="<?= base_url('tambah/updatetrack'); ?>" method="post">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-floating mb-3">
									<label for="tb-fname">Judul</label>
									<input type="text" class="form-control" id="idKeterangan" name="Title" placeholder="Kosong" value="<?= $foundTrack['Title']; ?>" readonly>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-floating mb-3">
									<label for="tb-fname">Author</label>
									<input type="text" class="form-control" id="idAuthor" name="Author" placeholder="Kosong" value="<?= $foundTrack['Author']; ?>" readonly>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-floating mb-3">
									<label for="tb-fname">Composer</label>
									<input type="text" class="form-control" id="idComposer" name="Composer" placeholder="Kosong" value="<?= $foundTrack['Composer']; ?>" readonly>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-floating mb-3">
									<label for="tb-fname">Genre</label>
									<input type="text" class="form-control" id="idGenre" name="Genre" placeholder="Kosong" value="<?= $foundTrack['Genre']; ?>" readonly>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-floating mb-3">
									<label for="tb-fname">Artist</label>
									<input type="text" class="form-control" id="idArtist" name="ArtistName" placeholder="Kosong" value="<?= $foundTrack['ArtistName']; ?>" readonly>
								</div>
							</div>

							<div class="col-lg-4">
								<div class="form-floating mb-3">
									<label for="tb-fname">ISRC</label>
									<input type="text" class="form-control" id="idISRC" name="ISRC" placeholder="Kosong" value="<?= $foundTrack['ISRC']; ?>">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-floating mb-3">
									<label for="tb-fname">PLine</label>
									<input type="text" class="form-control" id="idPLine" name="PLine" placeholder="Kosong" value="<?= $foundTrack['PLine']; ?>" readonly>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-floating mb-3">
									<label for="tb-fname">CLine</label>
									<input type="text" class="form-control" id="idCLine" name="CLine" placeholder="Kosong" value="<?= $foundTrack['CLine']; ?>" readonly>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-floating mb-3">
									<label for="tb-fname">ProductionDate</label>
									<input type="text" class="form-control" id="idProductionDate" name="TanggalProduksi" placeholder="Kosong" value="<?php echo date('d/m/Y', strtotime($foundTrack['TanggalProduksi']));  ?>" readonly>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-floating mb-3">
									<label for="tb-fname">OriginalReleaseDate</label>
									<input type="text" class="form-control" id="idOriginalReleaseDate" name="TanggalRilis" placeholder="Kosong" value="<?php echo date('d/m/Y', strtotime($foundTrack['TanggalRilis'])); ?>" readonly>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-floating mb-3">
									<label for="tb-fname">SpotifyId</label>
									<input type="text" class="form-control" id="idSpotifyId" name="SpotifyId" placeholder="Kosong" value="<?= $foundTrack['SpotifyId']; ?>" readonly>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-floating mb-3">
									<label for="tb-fname">iTunesId</label>
									<input type="text" class="form-control" id="idiTunesId" name="iTunesId" placeholder="Kosong" value="<?= $foundTrack['iTunesId']; ?>" readonly>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-floating mb-3">
									<label for="tb-fname">IsExplicit</label>
									<input type="text" class="form-control" id="idIsExplicit" name="IsExplicit" placeholder="Kosong" value="<?= $foundTrack['IsExplicit']; ?>" readonly>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-floating mb-3">
									<label for="tb-fname">IsCover</label>
									<input type="text" class="form-control" id="idIsCover" name="IsCover" placeholder="Kosong" value="<?= $foundTrack['IsCover']; ?>" readonly>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-floating mb-3">
									<label for="tb-fname">Language</label>
									<input type="text" class="form-control" id="idLanguage" name="Language" placeholder="Kosong" value="<?= $foundTrack['Language']; ?>" readonly>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-floating mb-3">
									<label for="tb-fname">Track</label>
									<br>
									<audio class="form-control" controls="" style="border:0px;height:calc(2.0em + .75rem + 2px);">
										<source src="<?= $foundTrack['Song']; ?>" type="audio/ogg">
										<source src="<?= $foundTrack['Song']; ?>" type="audio/mpeg">
										<source src="<?= $foundTrack['Song']; ?>" type="audio/wav">
									</audio>
									<input type="hidden" class="form-control" id="idTrack" name="Song" placeholder="" value="<?= $foundTrack['Song']; ?>">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-floating mb-3">
									<label for="tb-fname">CoverDocument</label>
									<input type="text" class="form-control" id="idCoverDocument" name="CoverDocument" placeholder="Kosong" value="<?= $foundTrack['CoverDocument']; ?>" readonly>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-floating mb-3">
									<label for="tb-fname">Lyrics</label>
									<textarea class="form-control" name="Lyrics" id="idLyrics" cols="80" rows="8" readonly><?= $foundTrack['Lyrics']; ?></textarea>
									<input type="hidden" class="form-control" name="Lyrics" id="idLyrics" placeholder="Kosong" value="<?= $foundTrack['Lyrics']; ?>" readonly>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="d-md-flex align-item-center">
									<div class="ms-auto mt-3 mt-md-0">
										<input type="hidden" name="KodeTrack" id="idKodeTrack" value="<?= $foundTrack['KodeTrack'] ?>">
										<button class="btn btn-primary">Update</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="py-6 px-6 text-center">
		<p class="mb-0 fs-4">
			Design and Developed by
			<a href="https://omegasoft.co.id/" target="_blank" class="pe-1 text-primary text-decoration-underline">omegasoft.co.id</a>
		</p>
	</div>
</div>

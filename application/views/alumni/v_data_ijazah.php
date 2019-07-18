
                <div class="row message-right-side-content">
                    <div class="col-md-12">
                        <div id="message-frame">
                            <div class="message-sidepanel">
                                <div class="message-contacts">
                                    <ul class="conversations">
                                        <h6 class="p-3">Questionnaire Settings</h6>
                                        <li class="contact ">
                                            <a href="<?php echo base_url('alumni/data_alumni/'); ?>" class="wrap d-flex align-items-center">
                                                <i class='bx bxs-user'></i>
                                                <div class="meta">
                                                    <p>Your Account</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="contact setting-active">
                                            <a href="<?php echo base_url('alumni/lihatIjazah/'); ?>" class="wrap d-flex align-items-center">
                                                <i class='bx bx-id-card'></i>
                                                <div class="meta">
                                                    <p>Ijazah</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="contact">
                                            <a href="#" class="wrap d-flex align-items-center">
                                                <i class='bx bx-block'></i>
                                                <div class="meta">
                                                    <p>Privacy</p>
                                                </div>
                                            </a>
                                        </li>
                                        <h6 class="p-3">Security &#38; Login</h6>
                                        <li class="contact">
                                            <a href="settings-password.html" class="wrap d-flex align-items-center">
                                                <i class='bx bxs-lock'></i>
                                                <div class="meta">
                                                    <p>Password</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="contact">
                                            <a href="#" class="wrap d-flex align-items-center">
                                                <i class='bx bxs-help-circle'></i>
                                                <div class="meta">
                                                    <p>Security Question</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="contact">
                                            <a href="settings-fingerprint.html" class="wrap d-flex align-items-center">
                                                <div class="meta"></div>
                                                <p><i class='bx bx-fingerprint'></i> Fingerprint Lock</p>
                                            </a>
                                        </li>
                                        <li class="contact">
                                            <a href="settings-location.html" class="wrap d-flex align-items-center">
                                                <div class="meta"></div>
                                                <p><i class='bx bxs-navigation'></i> Location</p>
                                            </a>
                                        </li>
                                        <h6 class="p-3">Billing &#38; Payment</h6>
                                        <li class="contact">
                                            <a href="settings-billing-method.html" class="wrap d-flex align-items-center">
                                                <div class="meta"></div>
                                                <p><i class='bx bxs-wallet'></i> Billing Method</p>
                                            </a>
                                        </li>
                                        <li class="contact">
                                            <a href="#" class="wrap d-flex align-items-center">
                                                <div class="meta"></div>
                                                <p><i class='bx bx-credit-card'></i> Automatic Payments</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="content">
                                <div class="settings-form p-4">
                                    <div class="row">
								 <div class="col-sm-8">
									<div class="">
                                    <h2>Data Ijazah</h2>
									</div>
								  </div>
                                  
								 <div class="col-sm-4">
									<div class="d-flex flex-row-reverse bd-highlight">
									</div>
								  </div>
                                    </div>
                                    <div class=" mb-4">
									  <div class="">
										<div class="table-responsive">
										  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
											<?php 
												$no = 1;
												foreach ($ijazah as $u){ 
                                                    $date=date_create($u->tanggal_ijazah);
												?>
											  <tr>
												<th>Nomor Ijazah </th>
                                                <td><?php echo $u->nomor_ijazah ?></td>
											  </tr>
											  <tr>
												<th>Tanggal Ijazah </th>
													<td><?= date_format($date,"d-m-Y") ; ?></td>
											  </tr>
											  <tr>
												<th>NIM</th>
													<td><?php echo $u->nim ?></td>
											  </tr>
											  <tr>
												<th>Berkas Ijazah</th>
                                                <td>
                                                    
                                                    <?php if($cek_ijazah == 'false'){ ?>
                                                        <?php echo "Dokumen ijazah tidak tersedia"; ?>
                                                        <a href="<?php echo base_url('upload/'); ?>" class="btn btn-primary btn-sm">Upload Ijazah</a>
                                                    <?php  }else{ ?>
                                                        <a target="_blank" rel="noopener noreferrer" href="<?php echo base_url();?>pdf/<?php echo $u->dokumen_ijazah ?> " class="btn btn-link btn-sm"><i class='bx bxs-file-pdf'></i> File</a>
                                                        <?php if($cek_validasi == 'true'){ ?>
                                                            <a href="<?php echo base_url('upload/'); ?>" class="btn btn-warning btn-sm" title="ganti file ijazah"><i class='bx bxs-pencil' ></i>Ganti file ijazah</a><br>
                                                            <small>*ganti file ijazah jika status upload di <strong>TOLAK</strong> atau masih belum diproses</small>
                                                        <?php } ?>
													<?php } ?>
													</td>
											  </tr>
											  <tr>
												<th>status</th>
                                                <td><?php echo $u->validasi ?></td>
											  </tr>
                                                <?php if($u->validasi == 'tolak'){ ?>
											  <tr>
												<th>catatan penolakan</th>
                                                <td><?php echo $u->catatan ?></td>
											  </tr>
                                                <?php } ?>
											</thead>
												<?php } ?>
										
										  </table>
										</div>
									  </div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                                    <div class="  mb-4">
									  <div class="">
										<div class="">
										<form action="<?php echo base_url('upload/uploadIjazah/'); ?>" method="post" enctype="multipart/form-data">
											<div class="form-group">
												<label for="weight">Pilih Dokumen Ijazah</label> 
												<input type="file" class="form- upload-file" name="dokumen" >
											</div>
											<div class="form-group text-right">
												<button type="submit" value="upload" class="btn btn-sm btn-primary">Upload Dokumen Ijzah</button>
											</div>
										</form>
										</div>
									  </div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
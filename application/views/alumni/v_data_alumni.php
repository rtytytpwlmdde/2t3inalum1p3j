
                <div class="row message-right-side-content">
                    <div class="col-md-12">
                        <div id="message-frame">
                            <div class="message-sidepanel">
                                <div class="message-contacts">
                                    <ul class="conversations">
                                        <h6 class="p-3">Questionnaire Settings</h6>
                                        <li class="contact setting-active">
                                            <a href="settings.html" class="wrap d-flex align-items-center">
                                                <i class='bx bxs-user'></i>
                                                <div class="meta">
                                                    <p>Your Account</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="contact">
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
                                    <h2>Data Diri</h2>
                                    <form action="" method="" class="mt-4 settings-form">
                                        <div class="col-md-6">
										<?php foreach($alumni as $u): ?>
                                            <div class="form-group">
                                                <label for="settingsFirstName">NIM</label>
                                                <input type="text" class="form-control" id="settingsFirstName" placeholder="First Name" disabled value="<?php echo $u->nim ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="settingsLastName">Nama</label>
                                                <input type="text" class="form-control" id="settingsLastName" placeholder="Last Name" disabled value="<?php echo $u->nama ?>">
                                            </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="settingsLastName">Email</label>
                                                <input type="text" class="form-control" id="settingsLastName" placeholder="Last Name" disabled value="<?php echo $u->email ?>">
                                            </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="settingsLastName">Jenjang</label>
                                                <input type="text" class="form-control" id="settingsLastName" placeholder="Last Name" disabled value="<?php echo $u->jenjang ?>">
                                            </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="settingsLastName">Jurusan</label>
                                                <input type="text" class="form-control" id="settingsLastName" placeholder="Last Name" disabled value="<?php echo $u->nama ?>">
                                            </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="settingsLastName">Prodi</label>
                                                <input type="text" class="form-control" id="settingsLastName" placeholder="Last Name" disabled value="<?php echo $u->nama ?>">
                                            </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="settingsLastName">Tahun Lulus</label>
                                                <input type="text" class="form-control" id="settingsLastName" placeholder="Last Name" disabled value="<?php echo $u->tahun_lulus ?>">
                                            </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="settingsLastName">Tanggal Yudisium</label>
                                                <input type="text" class="form-control" id="settingsLastName" placeholder="Last Name" disabled value="<?php echo $u->tanggal_yudisium ?>">
                                            </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="settingsLastName">Alamat</label>
                                                <input type="text" class="form-control" id="settingsLastName" placeholder="Last Name" disabled value="<?php echo $u->alamat ?>">
                                            </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="settingsLastName">Tanggal Lahir</label>
                                                <input type="text" class="form-control" id="settingsLastName" placeholder="Last Name" disabled value="<?php echo $u->tanggal_lahir ?>">
                                            </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="settingsLastName">Jenis Kelamin</label>
                                                <input type="text" class="form-control" id="settingsLastName" placeholder="Last Name" disabled value="<?php echo $u->jenis_kelamin ?>">
                                            </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="settingsLastName">Facebook</label>
                                                <input type="text" class="form-control" id="settingsLastName" placeholder="Last Name" disabled value="<?php echo $u->facebook ?>">
                                            </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="settingsLastName">Twitter</label>
                                                <input type="text" class="form-control" id="settingsLastName" placeholder="Last Name" disabled value="<?php echo $u->twitter ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-row mb-3 align-items-center">
                                                <div class="col">
                                                    <label for="settingsUsername">Username</label>
                                                    <input type="email" class="form-control" id="settingsUsername" aria-describedby="usernameHelp" value="arthur_minasyan_96" placeholder="Username">
                                                    <small id="usernameHelp" class="form-text text-muted">Your public username is the same as your timeline address.</small>
                                                </div>
                                                <div class="col check-username">
                                                    <span><i class='bx bx-check success'></i> Username is available</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                                        </div>
                                    </form>
									<?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php if ((int) $this->session->userdata('level') !== 1): ?>
    <!-- ADMIN TABLE: Compact User Info -->
    <table id="invoice-list" class="table dt-table-hover" style="width:100%">
        <thead>
            <tr>
                <th><input type="checkbox" id="check-all"></th>
                <th>ID</th>
                <th>Info</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allusers as $user): ?>
                <tr>
                    <td>
                        <input type="checkbox" class="row-check" name="user_ids[]" value="<?= $user['user_id'] ?>">
                    </td>
                    <td>
                        <a href="#"><span class="inv-number">#<?= $user['user_id'] ?></span></a>
                    </td>
                    <td>
                        <div class="d-flex">
                            <div class="usr-img-frame me-2 rounded-circle">
                                <img alt="avatar" class="img-fluid rounded-circle" src="../src/assets/img/profile-placeholder.jpeg">
                            </div>
                            <div class="align-self-center">
                                <p class="mb-0 fw-bold"><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></p>
                                <p class="mb-0 text-muted">@<?= htmlspecialchars($user['user_name']) ?></p>
                                <span class="inv-email d-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                    <?= htmlspecialchars($user['user_email']) ?>
                                </span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge 
                            <?= $user['level'] == 1 ? 'badge-light-success' : ($user['level'] == 2 ? 'badge-light-primary' : 'badge-light-warning') ?> inv-status">
                            <?= $user['level'] == 1 ? 'Admin' : ($user['level'] == 2 ? 'Editor' : 'Viewer') ?>
                        </span>
                    </td>
                    <td>
                        <span class="inv-date">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-calendar">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <?= date('d M Y', strtotime($user['created_at'])) ?>
                        </span>
                        <br>
                        <small><?= date('d M Y', strtotime($user['modified_at'])) ?></small>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <!-- NON-ADMIN TABLE: Invoice View Example -->
    <table id="invoice-list" class="table dt-table-hover" style="width:100%">
        <thead>
            <tr>
                <th><input type="checkbox" id="check-all"></th>
                <th>ID</th>
                <th>Info</th>
                <th>Status</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allusers as $i => $user): ?>
                <tr>
                    <td>
                        <input
                            type="checkbox"
                            class="row-check"
                            name="user_ids[]"
                            value="<?= $user['user_id'] ?>"
                            data-age="<?= $user['user_age'] ?>">
                    </td>
                    <td class="checkbox-column"><?= $user['user_id'] ?></td> <!-- The real ID -->
                    <td>
                        <div class="d-flex">
                            <div class="align-self-center">
                                <p class="mb-0 fw-bold"><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></p>
                                <p class="mb-0 text-muted">@<?= htmlspecialchars($user['user_name']) ?></p>
                                <span class="inv-email d-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                    <?= htmlspecialchars($user['user_email']) ?>
                                </span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge 
                            <?= $user['level'] == 1 ? 'badge-light-success' : ($user['level'] == 2 ? 'badge-light-primary' : 'badge-light-warning') ?> inv-status">
                            <?= $user['level'] == 1 ? 'Admin' : ($user['level'] == 2 ? 'Editor' : 'Viewer') ?>
                        </span>
                    </td>
                    <td>
                        <span class="inv-amount">$0.00</span>
                    </td>
                    <td>
                        <span class="inv-date">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-calendar">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <?= date('d M Y', strtotime($user['created_at'])) ?>
                        </span>
                    </td>
                    <td>
                        <!-- Per-row action buttons still here! -->
                        <a class="badge badge-light-primary text-start me-2 action-edit" href="javascript:void(0);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                <path d="M12 20h9"></path>
                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                            </svg>
                        </a>
                        <a class="badge badge-light-danger text-start action-delete" href="javascript:void(0);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            </svg>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
<!-- Registration Modal -->
<div class="modal fade zoomInUp inputForm-modal" id="registerUserModal" tabindex="-1" role="dialog" aria-labelledby="registerUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" id="registerUserModalLabel">
                <h5 class="modal-title">Register New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form
                    id="registerForm"
                    method="post"
                    action="<?= base_url('admin/register_user'); ?>"
                    enctype="multipart/form-data"
                    class="mt-0">
                    <div id="registerAlert"></div>
                    <!-- FIRST NAME -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <span class="input-group-text d-flex align-items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="7" r="4" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                </svg>
                                <span>First</span>
                            </span>
                            <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                        </div>
                    </div>
                    <!-- LAST NAME -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <span class="input-group-text d-flex align-items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-id" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="16" rx="2" />
                                    <circle cx="9" cy="10" r="2" />
                                    <line x1="15" y1="8" x2="17" y2="8" />
                                    <line x1="15" y1="12" x2="17" y2="12" />
                                    <line x1="7" y1="16" x2="17" y2="16" />
                                </svg>
                                <span>Last</span>
                            </span>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                        </div>
                    </div>
                    <!-- USERNAME -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <span class="input-group-text d-flex align-items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-at" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="4" />
                                    <path d="M16 12a4 4 0 1 1 -4 4" />
                                    <path d="M16 8v-2a2 2 0 0 0 -2 -2h-1" />
                                </svg>
                                <span>Username</span>
                            </span>
                            <input type="text" name="user_name" class="form-control" placeholder="Username" required>
                        </div>
                    </div>
                    <!-- EMAIL -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <span class="input-group-text d-flex align-items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="5" width="18" height="14" rx="2" />
                                    <polyline points="3 7 12 13 21 7" />
                                </svg>
                                <span>Email</span>
                            </span>
                            <input type="email" name="user_email" class="form-control" placeholder="Email" required>
                        </div>
                    </div>
                    <!-- PASSWORD -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <span class="input-group-text d-flex align-items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="5" y="11" width="14" height="10" rx="2" />
                                    <circle cx="12" cy="16" r="1" />
                                    <path d="M8 11v-4a4 4 0 0 1 8 0v4" />
                                </svg>
                                <span>Password</span>
                            </span>
                            <input type="password" name="user_password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <!-- CONFIRM PASSWORD -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <span class="input-group-text d-flex align-items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="5" y="11" width="14" height="10" rx="2" />
                                    <circle cx="12" cy="16" r="1" />
                                    <path d="M8 11v-4a4 4 0 0 1 8 0v4" />
                                    <path d="M15 19l2 2l4 -4" />
                                </svg>
                                <span>Confirm</span>
                            </span>
                            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <!-- Profile Image -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <span class="input-group-text d-flex align-items-center gap-2">
                                <svg ...></svg>
                                <span>Profile Image</span>
                            </span>
                            <input type="file" name="profile_image" class="form-control" accept="image/*" required>
                        </div>
                    </div>
                    <!-- USER LEVEL (optional for admin) -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <span class="input-group-text d-flex align-items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layers" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="12 2 2 7 12 12 22 7 12 2" />
                                    <polyline points="2 17 12 22 22 17" />
                                    <polyline points="2 12 12 17 22 12" />
                                </svg>
                                <span>Level</span>
                            </span>
                            <select name="level" class="form-control">
                                <option value="1">Admin</option>
                                <option value="2" selected>User</option>
                                <option value="3">Limited</option>
                            </select>
                        </div>
                    </div>
                    <!-- Modal actions -->
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-light-danger mt-2 mb-2 btn-no-effect w-45" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-secondary mt-2 mb-2 w-45">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade zoomInUp inputForm-modal" id="adminEditModal" tabindex="-1" role="dialog" aria-labelledby="adminEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" id="inputFormModalLabel">
                <h5 class="modal-title">Edit User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form id="adminEditForm" method="post" action="<?= site_url('admin/update_user') ?>">
                    <input type="hidden" name="user_id" id="admin_user_id">
                    <div id="adminAlert"></div>
                    <!-- First Name -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <span class="input-group-text">First</span>
                            <input type="text" name="first_name" id="admin_first_name" class="form-control" placeholder="First Name" required>
                        </div>
                    </div>
                    <!-- Last Name -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Last</span>
                            <input type="text" name="last_name" id="admin_last_name" class="form-control" placeholder="Last Name" required>
                        </div>
                    </div>
                    <!-- Username -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Username</span>
                            <input type="text" name="user_name" id="admin_user_name" class="form-control" placeholder="Username" required>
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Email</span>
                            <input type="email" name="user_email" id="admin_user_email" class="form-control" placeholder="Email" required>
                        </div>
                    </div>
                    <!-- Age -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Age</span>
                            <input type="number" name="user_age" id="admin_user_age" class="form-control" placeholder="Age" min="0">
                        </div>
                    </div>
                    <!-- Level -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Level</span>
                            <select name="level" id="admin_level" class="form-control">
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                                <option value="3">Limited</option>
                            </select>
                        </div>
                    </div>
                    <!-- Password (Optional) -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Password</span>
                            <input type="password" name="user_password" class="form-control" placeholder="New Password (leave blank to keep)">
                        </div>
                    </div>
                    <!-- Actions -->
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-light-danger mt-2 mb-2 btn-no-effect w-45" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-secondary mt-2 mb-2 w-45">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
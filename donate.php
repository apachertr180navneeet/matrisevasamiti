<?php 
$page_title = "Donate Online - Matri Seva Samiti (80G Tax Exemption)";
include 'includes/header.php'; 

$selectedCause = isset($_GET['cause']) ? htmlspecialchars($_GET['cause']) : 'general';
$defaultAmount = isset($_GET['amount']) && is_numeric($_GET['amount']) ? intval($_GET['amount']) : 1000;
?>

<main>
    <!-- BREADCRUMBS -->
    <section class="ul-breadcrumb ul-section-spacing">
        <div class="ul-container">
            <h2 class="ul-breadcrumb-title">Donate &amp; Transform Lives</h2>
            <ul class="ul-breadcrumb-nav">
                <li><a href="index.php">Home</a></li>
                <li><span class="separator"><i class="flaticon-right"></i></span></li>
                <li>Donations</li>
            </ul>
        </div>
    </section>

    <!-- DONATION MAIN SECTION -->
    <section class="ul-section-spacing">
        <div class="ul-container">
            <div class="row gy-5">
                <!-- Left Column: Interactive Donation Form & 80G Calculation -->
                <div class="col-lg-8">
                    <div class="card p-4 p-md-5 border-0 shadow-sm rounded-4" style="background: #ffffff;">
                        <span class="ul-section-sub-title">100% Secure &amp; Tax Deductible (80G)</span>
                        <h2 class="ul-section-title mb-4">Choose Your Contribution Amount</h2>

                        <!-- Amount Selection Pills -->
                        <div class="row g-3 mb-4" id="amount-pills">
                            <div class="col-sm-4 col-6">
                                <button type="button" class="btn w-100 py-3 rounded-3 amt-pill <?php echo $defaultAmount == 500 ? 'btn-primary active text-white' : 'btn-outline-secondary'; ?>" data-amt="500" style="<?php echo $defaultAmount == 500 ? 'background: var(--ul-primary); border-color: var(--ul-primary);' : ''; ?>">
                                    <h4 class="mb-1 font-bold">₹500</h4>
                                    <small style="font-size: 11px;">1 Month School Books</small>
                                </button>
                            </div>
                            <div class="col-sm-4 col-6">
                                <button type="button" class="btn w-100 py-3 rounded-3 amt-pill <?php echo $defaultAmount == 1000 ? 'btn-primary active text-white' : 'btn-outline-secondary'; ?>" data-amt="1000" style="<?php echo $defaultAmount == 1000 ? 'background: var(--ul-primary); border-color: var(--ul-primary);' : ''; ?>">
                                    <h4 class="mb-1 font-bold">₹1,000</h4>
                                    <small style="font-size: 11px;">1 Child Skill &amp; Bag Kit</small>
                                </button>
                            </div>
                            <div class="col-sm-4 col-6">
                                <button type="button" class="btn w-100 py-3 rounded-3 amt-pill <?php echo $defaultAmount == 2500 ? 'btn-primary active text-white' : 'btn-outline-secondary'; ?>" data-amt="2500" style="<?php echo $defaultAmount == 2500 ? 'background: var(--ul-primary); border-color: var(--ul-primary);' : ''; ?>">
                                    <h4 class="mb-1 font-bold">₹2,500</h4>
                                    <small style="font-size: 11px;">Health Kit for 5 Families</small>
                                </button>
                            </div>
                            <div class="col-sm-4 col-6">
                                <button type="button" class="btn w-100 py-3 rounded-3 amt-pill <?php echo $defaultAmount == 5000 ? 'btn-primary active text-white' : 'btn-outline-secondary'; ?>" data-amt="5000" style="<?php echo $defaultAmount == 5000 ? 'background: var(--ul-primary); border-color: var(--ul-primary);' : ''; ?>">
                                    <h4 class="mb-1 font-bold">₹5,000</h4>
                                    <small style="font-size: 11px;">1 Month Tailoring Course</small>
                                </button>
                            </div>
                            <div class="col-sm-4 col-6">
                                <button type="button" class="btn w-100 py-3 rounded-3 amt-pill <?php echo $defaultAmount == 10000 ? 'btn-primary active text-white' : 'btn-outline-secondary'; ?>" data-amt="1000" style="<?php echo $defaultAmount == 10000 ? 'background: var(--ul-primary); border-color: var(--ul-primary);' : ''; ?>">
                                    <h4 class="mb-1 font-bold">₹10,000</h4>
                                    <small style="font-size: 11px;">Adopt a Village Learning Hub</small>
                                </button>
                            </div>
                            <div class="col-sm-4 col-6">
                                <button type="button" class="btn w-100 py-3 rounded-3 amt-pill <?php echo $defaultAmount == 25000 ? 'btn-primary active text-white' : 'btn-outline-secondary'; ?>" data-amt="25000" style="<?php echo $defaultAmount == 25000 ? 'background: var(--ul-primary); border-color: var(--ul-primary);' : ''; ?>">
                                    <h4 class="mb-1 font-bold">₹25,000</h4>
                                    <small style="font-size: 11px;">Full Health &amp; Eye Camp</small>
                                </button>
                            </div>
                        </div>

                        <!-- Custom Amount Entry -->
                        <div class="mb-4">
                            <label class="form-label font-semibold text-muted">Or Enter Custom Amount (₹)</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light fw-bold">₹</span>
                                <input type="number" id="custom-amount-input" class="form-control" value="<?php echo $defaultAmount; ?>" min="100" placeholder="e.g. 1500">
                            </div>
                        </div>

                        <!-- 80G Tax Benefit Card -->
                        <div class="p-3 mb-4 rounded-3 d-flex justify-content-between align-items-center" style="background: rgba(235, 83, 16, 0.08); border: 1px dashed var(--ul-primary);">
                            <div>
                                <h6 class="mb-1 text-dark font-bold"><i class="flaticon-price-tag me-1" style="color:var(--ul-primary);"></i> Section 80G Tax Exemption Benefit</h6>
                                <p class="mb-0 text-muted" style="font-size: 12px;">50% of your donation qualifies for income tax deduction under Indian IT rules.</p>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-white text-dark border px-3 py-2 fs-6" id="taxBenefitAmount">₹<?php echo number_format($defaultAmount * 0.15); ?> Saved</span>
                            </div>
                        </div>

                        <!-- Donor Checkout Form -->
                        <form action="ccavRequestHandler.php" method="POST" id="donorCheckoutForm">
                            <h4 class="mb-3 text-dark">Donor Details (For 80G Certificate Receipt)</h4>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Full Name *</label>
                                    <input type="text" name="billing_name" class="form-control" placeholder="e.g. Anjali Sharma" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email Address * (For Receipt)</label>
                                    <input type="email" name="billing_email" class="form-control" placeholder="anjali@example.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Mobile Number *</label>
                                    <input type="tel" name="billing_tel" class="form-control" placeholder="+91 9876543210" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">PAN Number (Required for 80G Tax Benefit)</label>
                                    <input type="text" name="merchant_param1" class="form-control text-uppercase" placeholder="ABCDE1234F">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Allocate Donation To</label>
                                    <select name="merchant_param2" class="form-select">
                                        <option value="general" <?php echo $selectedCause == 'general' ? 'selected' : ''; ?>>General Humanitarian Fund</option>
                                        <option value="education" <?php echo $selectedCause == 'education' ? 'selected' : ''; ?>>Child &amp; Girl Education Drive</option>
                                        <option value="healthcare" <?php echo $selectedCause == 'healthcare' ? 'selected' : ''; ?>>Rural Free Healthcare &amp; Eye Camps</option>
                                        <option value="women" <?php echo $selectedCause == 'women' ? 'selected' : ''; ?>>Women Vocational Sewing &amp; Micro-Enterprise</option>
                                        <option value="meals" <?php echo $selectedCause == 'meals' ? 'selected' : ''; ?>>Daily Hot Meals &amp; Ration Distribution</option>
                                    </select>
                                </div>
                            </div>

                            <input type="hidden" name="amount" id="final-form-amount" value="<?php echo $defaultAmount; ?>">

                            <div class="mt-4">
                                <button type="submit" class="ul-btn w-100 justify-content-center py-3 fs-5">
                                    <i class="flaticon-fast-forward-double-right-arrows-symbol"></i> Proceed to Pay ₹<span id="btn-amt-display"><?php echo number_format($defaultAmount); ?></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right Column: Instant UPI QR & Bank NEFT Transfer -->
                <div class="col-lg-4">
                    <!-- UPI Instant QR Box -->
                    <div class="card p-4 border-0 shadow-sm rounded-4 mb-4 text-center" style="background: #ffffff;">
                        <h4 class="mb-2 text-dark"><i class="flaticon-price-tag text-primary"></i> Scan &amp; Pay with UPI</h4>
                        <p class="text-muted" style="font-size: 13px;">GPay, PhonePe, Paytm, BHIM, Amazon Pay</p>
                        
                        <div class="p-3 bg-light rounded-4 d-inline-block mx-auto mb-3" style="max-width: 240px;">
                            <img src="images/scanner.jpeg" alt="UPI QR Code" class="img-fluid rounded-3">
                        </div>

                        <div class="p-2 rounded-3 bg-light border text-center mb-3">
                            <small class="text-muted d-block">Official UPI VPA:</small>
                            <strong class="text-dark fs-6" id="upiVpaText">matrisevasamiti1910@sbi</strong>
                        </div>

                        <button type="button" onclick="navigator.clipboard.writeText('matrisevasamiti1910@sbi'); alert('UPI ID copied to clipboard!');" class="btn btn-outline-dark btn-sm rounded-pill w-100">
                            <i class="flaticon-right"></i> Copy UPI ID
                        </button>
                    </div>

                    <!-- Direct Bank Transfer Details -->
                    <div class="card p-4 border-0 shadow-sm rounded-4 text-dark" style="background: #ffffff;">
                        <h4 class="mb-3"><i class="flaticon-email"></i> Direct Bank NEFT / RTGS</h4>
                        <table class="table table-borderless table-sm mb-3" style="font-size: 13px;">
                            <tbody>
                                <tr>
                                    <td class="text-muted">Account Name:</td>
                                    <td class="fw-bold text-end">MATRI SEVA SAMITI</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Bank Name:</td>
                                    <td class="fw-bold text-end">State Bank of India (SBI)</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Account No:</td>
                                    <td class="fw-bold text-end text-primary">41258963214</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">IFSC Code:</td>
                                    <td class="fw-bold text-end">SBIN0001234</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Account Type:</td>
                                    <td class="fw-bold text-end">Current Account</td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" onclick="navigator.clipboard.writeText('Account: 41258963214, IFSC: SBIN0001234, Name: MATRI SEVA SAMITI'); alert('Bank details copied!');" class="btn btn-outline-dark btn-sm rounded-pill w-100">
                            Copy Bank Account Info
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const pills = document.querySelectorAll('.amt-pill');
    const customInput = document.getElementById('custom-amount-input');
    const formAmount = document.getElementById('final-form-amount');
    const btnDisplay = document.getElementById('btn-amt-display');
    const taxBenefit = document.getElementById('taxBenefitAmount');

    function updateAmount(val) {
        val = parseInt(val) || 0;
        formAmount.value = val;
        btnDisplay.textContent = val.toLocaleString('en-IN');
        taxBenefit.textContent = '₹' + Math.round(val * 0.15).toLocaleString('en-IN') + ' Saved';
    }

    pills.forEach(pill => {
        pill.addEventListener('click', function() {
            pills.forEach(p => {
                p.classList.remove('btn-primary', 'active', 'text-white');
                p.classList.add('btn-outline-secondary');
                p.style.background = '';
                p.style.borderColor = '';
            });
            this.classList.add('btn-primary', 'active', 'text-white');
            this.classList.remove('btn-outline-secondary');
            this.style.background = 'var(--ul-primary)';
            this.style.borderColor = 'var(--ul-primary)';
            const amt = this.getAttribute('data-amt');
            customInput.value = amt;
            updateAmount(amt);
        });
    });

    customInput.addEventListener('input', function() {
        const val = this.value;
        pills.forEach(p => {
            if (p.getAttribute('data-amt') === val) {
                p.classList.add('btn-primary', 'active', 'text-white');
                p.classList.remove('btn-outline-secondary');
                p.style.background = 'var(--ul-primary)';
                p.style.borderColor = 'var(--ul-primary)';
            } else {
                p.classList.remove('btn-primary', 'active', 'text-white');
                p.classList.add('btn-outline-secondary');
                p.style.background = '';
                p.style.borderColor = '';
            }
        });
        updateAmount(val);
    });
});
</script>

<?php include 'includes/footer.php'; ?>
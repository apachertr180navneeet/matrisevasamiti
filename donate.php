<?php 
$page_title = "Donate - Matri Seva Samiti | 80G Tax Exemption Eligible";
include 'includes/header.php'; 

$selectedCause = isset($_GET['cause']) ? htmlspecialchars($_GET['cause']) : 'general';
?>

<main>
    <!-- Page Hero -->
    <section class="page-hero">
        <img src="images/donateherobg.png" alt="Donate Background" class="page-hero-bg">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php">Home</a> <span>/</span> <span>Donate</span>
            </div>
            <h1>Transform Lives Through <span class="highlight">Your Generosity</span></h1>
            <p>Every rupee you give empowers a rural child, heals a patient, or trains an aspiring youth. 50% tax exempt under 80G.</p>
        </div>
    </section>

    <!-- Main Donation Interface -->
    <section style="padding: 70px 0; background: var(--bg-slate);">
        <div class="container">
            <div class="donation-wrapper">
                <!-- Left: Interactive Donation Form -->
                <div class="donation-box-main">
                    <h2>Select Your <span class="text-underline-gold">Contribution</span> Amount</h2>
                    <p>Choose a suggested impact tier or enter your own custom amount:</p>

                    <!-- Preset Amount Selector -->
                    <div class="amount-selector-grid">
                        <div class="amount-btn-card active" data-amount="500">
                            <span class="amt-val">₹500</span>
                            <span class="amt-impact">1 Month School Books</span>
                        </div>
                        <div class="amount-btn-card" data-amount="1000">
                            <span class="amt-val">₹1,000</span>
                            <span class="amt-impact">1 Child Skill Kit</span>
                        </div>
                        <div class="amount-btn-card" data-amount="2500">
                            <span class="amt-val">₹2,500</span>
                            <span class="amt-impact">Health Kit for 5 Families</span>
                        </div>
                        <div class="amount-btn-card" data-amount="5000">
                            <span class="amt-val">₹5,000</span>
                            <span class="amt-impact">1 Month Tailoring Course</span>
                        </div>
                        <div class="amount-btn-card" data-amount="10000">
                            <span class="amt-val">₹10,000</span>
                            <span class="amt-impact">Adopt a Village Center</span>
                        </div>
                        <div class="amount-btn-card" data-amount="25000">
                            <span class="amt-val">₹25,000</span>
                            <span class="amt-impact">Full Rural Health Camp</span>
                        </div>
                    </div>

                    <!-- Custom Amount Input -->
                    <div class="custom-amt-input-wrap">
                        <span>₹</span>
                        <input type="number" id="custom-amount" class="custom-amt-input" placeholder="Enter other amount (e.g. 1500)" value="500" min="100">
                    </div>

                    <!-- 80G Tax Savings Calculator Display -->
                    <div class="tax-calc-card">
                        <div class="tax-calc-text">
                            <h4><i class="fas fa-calculator"></i> 80G Tax Benefit (Approx. Savings)</h4>
                            <p>50% of your donation is tax deductible under Section 80G of Income Tax Act.</p>
                        </div>
                        <div class="tax-savings-amount" id="tax-savings-amount">₹75</div>
                    </div>

                    <!-- Donor Information Form -->
                    <form action="ccavRequestHandler.php" method="POST" class="donation-form" id="donationForm">
                        <h3 style="font-size: 1.3rem; margin: 30px 0 16px; color: var(--forest-900);">Donor Information (For 80G Receipt)</h3>
                        
                        <div class="donation-form-grid">
                            <div class="form-group">
                                <label for="donor_name">Full Name *</label>
                                <input type="text" id="donor_name" name="billing_name" class="form-control" placeholder="e.g. Rahul Sharma" required>
                            </div>

                            <div class="form-group">
                                <label for="donor_email">Email Address * (For Receipt)</label>
                                <input type="email" id="donor_email" name="billing_email" class="form-control" placeholder="name@example.com" required>
                            </div>

                            <div class="form-group">
                                <label for="donor_phone">Mobile Number *</label>
                                <input type="tel" id="donor_phone" name="billing_tel" class="form-control" placeholder="+91 9876543210" required>
                            </div>

                            <div class="form-group">
                                <label for="donor_pan">PAN Number (Required for 80G Tax Exemption)</label>
                                <input type="text" id="donor_pan" name="merchant_param1" class="form-control" placeholder="ABCDE1234F" style="text-transform: uppercase;">
                            </div>

                            <div class="form-group full-width">
                                <label for="cause_select">Direct Contribution Towards</label>
                                <select id="cause_select" name="merchant_param2" class="form-control">
                                    <option value="general" <?php echo $selectedCause == 'general' ? 'selected' : ''; ?>>General Rural Development Fund</option>
                                    <option value="education" <?php echo $selectedCause == 'education' ? 'selected' : ''; ?>>Child Education & Remedial Learning</option>
                                    <option value="women" <?php echo $selectedCause == 'women' ? 'selected' : ''; ?>>Women Self-Help Groups & Tailoring</option>
                                    <option value="health" <?php echo $selectedCause == 'health' ? 'selected' : ''; ?>>Rural Free Healthcare & Eye Camps</option>
                                    <option value="skill" <?php echo $selectedCause == 'skill' ? 'selected' : ''; ?>>Youth Vocational Skill Training</option>
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="amount" id="form-amount" value="500">

                        <button type="button" onclick="document.getElementById('upiModal').classList.add('active')" class="btn btn-gold btn-lg btn-pulse" style="width: 100%; font-size: 1.15rem; font-weight: 700; margin-top: 10px;">
                            <i class="fas fa-lock"></i> Proceed to Donate <span id="display-donation-amount">₹500</span>
                        </button>
                    </form>
                </div>

                <!-- Right: Instant UPI QR Code & Bank Transfer Details -->
                <div class="donation-sidebar">
                    <!-- UPI Instant QR Code -->
                    <div class="upi-qr-card">
                        <h3><i class="fas fa-qrcode" style="color: var(--gold-dark);"></i> Scan & Pay with UPI</h3>
                        <p style="font-size: 0.85rem; color: var(--text-muted);">GPay, PhonePe, Paytm, BHIM, Amazon Pay</p>
                        
                        <div class="qr-image-wrap">
                            <img src="images/scanner.jpeg" alt="Matri Seva Samiti UPI QR Code">
                        </div>

                        <div class="upi-id-badge" id="upiBadge">
                            <span>UPI: <strong>matrisevasamiti1910@sbi</strong></span>
                        </div>
                        <br>
                        <button type="button" onclick="copyToClipboard('matrisevasamiti1910@sbi', 'upiBadge', 'UPI ID copied!')" class="btn btn-outline-forest btn-sm">
                            <i class="fas fa-copy"></i> Copy UPI ID
                        </button>
                    </div>

                    <!-- Direct Bank Transfer Details -->
                    <div class="bank-details-card">
                        <h3><i class="fas fa-university" style="color: var(--gold-dark);"></i> Bank NEFT / RTGS Details</h3>
                        <table class="bank-table">
                            <tr>
                                <td>Account Name:</td>
                                <td>MATRI SEVA SAMITI</td>
                            </tr>
                            <tr>
                                <td>Bank Name:</td>
                                <td>State Bank of India (SBI)</td>
                            </tr>
                            <tr>
                                <td>Account Number:</td>
                                <td id="bankAccNo">41258963214</td>
                            </tr>
                            <tr>
                                <td>IFSC Code:</td>
                                <td id="bankIfsc">SBIN0001234</td>
                            </tr>
                            <tr>
                                <td>Account Type:</td>
                                <td>Current Account</td>
                            </tr>
                            <tr>
                                <td>Branch:</td>
                                <td>Prayagraj Main Branch, UP</td>
                            </tr>
                        </table>
                        <div style="margin-top: 15px; text-align: center;">
                            <button type="button" onclick="copyToClipboard('41258963214', 'bankAccNo', 'Bank Account Number Copied!')" class="btn btn-outline-forest btn-sm">
                                <i class="fas fa-copy"></i> Copy Bank Details
                            </button>
                        </div>
                    </div>

                    <!-- Trust & Guarantee -->
                    <div class="trust-badges-box">
                        <div class="trust-item">
                            <i class="fas fa-shield-alt"></i>
                            <p>100% Secure & Encrypted</p>
                        </div>
                        <div class="trust-item">
                            <i class="fas fa-receipt"></i>
                            <p>Instant 80G Receipt</p>
                        </div>
                        <div class="trust-item">
                            <i class="fas fa-check-double"></i>
                            <p>Audited NGO</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- UPI Modal -->
    <div class="custom-modal" id="upiModal">
        <div class="modal-dialog" style="max-width: 500px; text-align: center;">
            <button class="modal-close-btn" onclick="document.getElementById('upiModal').classList.remove('active')"><i class="fas fa-times"></i></button>
            <h3 style="font-size: 1.5rem; margin-bottom: 8px; color: var(--forest-900);">Complete Your Donation</h3>
            <p style="color: var(--text-muted); font-size: 0.9rem;">Scan the QR code below using Google Pay, PhonePe, Paytm, or BHIM:</p>
            
            <div style="width: 220px; height: 220px; margin: 20px auto; border: 3px solid var(--gold-primary); border-radius: 12px; padding: 10px; background: white;">
                <img src="images/scanner.jpeg" alt="UPI QR Scanner" style="width: 100%; height: 100%; object-fit: contain;">
            </div>

            <div style="background: var(--bg-slate-soft); padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem;">
                <strong>UPI ID:</strong> matrisevasamiti1910@sbi
            </div>

            <p style="font-size: 0.85rem; color: #15803d; font-weight: 600;">
                <i class="fas fa-check-circle"></i> After payment, please email the transaction screenshot to <strong>matrisevasamiti1910@gmail.com</strong> with your PAN to receive the 80G Tax Exemption Certificate.
            </p>

            <button type="button" class="btn btn-gold" style="margin-top: 15px; width: 100%;" onclick="alert('Thank you! Please share your transaction ID with us for 80G receipt generation.'); document.getElementById('upiModal').classList.remove('active');">
                <i class="fas fa-check"></i> I Have Completed the Payment
            </button>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>
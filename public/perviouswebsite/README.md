# Matri Seva Samiti NGO Website

A modern, responsive website for Matri Seva Samiti - an NGO dedicated to empowering rural communities through skill development, healthcare, and educational initiatives.

## 🌟 Features

- **Responsive Design**: Works perfectly on all devices (mobile, tablet, desktop)
- **Modern UI/UX**: Clean, professional design with smooth animations
- **Contact Forms**: Volunteer registration and contact forms with email functionality
- **Project Showcase**: Detailed project pages with filtering capabilities
- **Blog System**: News and updates section
- **Donation Information**: Comprehensive donation page with bank details
- **SEO Optimized**: Clean URLs and meta tags for better search engine visibility

## 📁 File Structure

```
matrisevasamiti.ngo/
├── index.php                 # Homepage
├── about.php                 # About Us page
├── contact.php               # Contact page with form
├── projects.php              # Projects showcase
├── blogs.php                 # Blog/News section
├── donate.php                # Donation information
├── process-volunteer.php     # Volunteer form processing
├── includes/
│   ├── header.php           # Site header and navigation
│   └── footer.php           # Site footer
├── assets/
│   ├── css/
│   │   ├── style.css        # Main stylesheet
│   │   └── responsive.css   # Mobile responsiveness
│   └── js/
│       └── main.js          # JavaScript functionality
├── logo/                    # Logo files
├── images/                  # Website images
├── .htaccess               # URL rewriting and security
└── README.md               # This file
```

## 🚀 Setup Instructions

### Prerequisites
- PHP 7.4 or higher
- Web server (Apache/Nginx)
- Mail server or SMTP configuration for contact forms

### Installation

1. **Upload Files**
   ```bash
   # Upload all files to your web server root directory
   # Ensure proper file permissions (755 for directories, 644 for files)
   ```

2. **Configure Email**
   - Update email settings in `process-volunteer.php` and `contact.php`
   - Replace `matrisevasamiti1910@gmail.com` with your actual email
   - Configure SMTP if needed for reliable email delivery

3. **Update Content**
   - Replace placeholder bank details in `donate.php`
   - Add actual UPI ID and payment gateway integration
   - Update contact information throughout the site
   - Replace placeholder images with actual project photos

4. **Logo Setup**
   - Ensure logo files are in the `logo/` directory
   - Update logo paths if needed in header and footer files

### Configuration

#### Email Setup
Edit the email configuration in form processing files:
```php
$to = "your-email@domain.com";
$headers = "From: noreply@yourdomain.com";
```

#### Contact Information
Update contact details in:
- `includes/footer.php`
- `contact.php`
- `donate.php`

#### Bank Details
Update donation information in `donate.php`:
- Account number
- IFSC code
- UPI ID
- Bank name and branch

## 🎨 Customization

### Colors
The website uses a primary orange color scheme (`#ff6b35`). To change:
1. Open `assets/css/style.css`
2. Find and replace `#ff6b35` with your preferred color
3. Update hover states and gradients accordingly

### Fonts
The site uses Google Fonts (Poppins). To change:
1. Update the Google Fonts link in `includes/header.php`
2. Modify the font-family in `assets/css/style.css`

### Images
- Replace background images with your own
- Add project photos to the `images/` directory
- Update image paths in the PHP files

## 📧 Form Functionality

### Volunteer Registration
- Form: Homepage volunteer form
- Processing: `process-volunteer.php`
- Email notifications: Both admin and volunteer receive emails

### Contact Form
- Form: `contact.php`
- Processing: Built into the same file
- Validation: Server-side validation for all fields

## 🔧 Technical Features

### Security
- `.htaccess` security headers
- Input sanitization and validation
- Protection against common vulnerabilities

### Performance
- Gzip compression
- Browser caching
- Optimized images and assets
- Minimal JavaScript usage

### SEO
- Clean, descriptive URLs
- Meta tags and descriptions
- Structured data markup ready
- Mobile-friendly design

## 📱 Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Internet Explorer 11+

## 🤝 Contributing

If you need to make updates:

1. Test changes on a staging environment first
2. Keep backups of important files
3. Maintain the responsive design principles
4. Follow PHP best practices for security

## 📞 Support

For technical support or questions:
- Email: matrisevasamiti1910@gmail.com
- Phone: (+91) 9415451910

## 📄 License

This website is created for Matri Seva Samiti NGO. All rights reserved.

---

**Built with ❤️ for empowering rural communities** 
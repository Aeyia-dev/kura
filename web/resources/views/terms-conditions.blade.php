<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Terms & Conditions - AEYIA</title>
  <style>
    /* Matter Font */
    @font-face {
        font-family: 'Matter';
        src: url('/fonts/matter/MatterRegular.otf') format('opentype');
        font-weight: 400;
        font-style: normal;
        font-display: swap;
    }

    @font-face {
        font-family: 'Matter';
        src: url('/fonts/matter/MatterThin.otf') format('opentype');
        font-weight: 100;
        font-style: normal;
        font-display: swap;
    }

    @font-face {
        font-family: 'Matter';
        src: url('/fonts/matter/MatterLight.otf') format('opentype');
        font-weight: 300;
        font-style: normal;
        font-display: swap;
    }

    @font-face {
        font-family: 'Matter';
        src: url('/fonts/matter/MatterMedium.otf') format('opentype');
        font-weight: 500;
        font-style: normal;
        font-display: swap;
    }

    /* Base styles */
    :root {
      --primary-text: #212026;
      --white: #ffffff;
      --charcoal: #212026;
      --heading-font: 'Matter', sans-serif;
      --body-font: 'Matter', sans-serif;
      --container-width: 1200px;
      --spacing-sm: 0.5rem;
      --spacing-md: 1rem;
      --spacing-lg: 2rem;
      --spacing-xl: 3rem;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: var(--body-font), sans-serif;
      font-size: 16px;
      line-height: 1.5;
      color: var(--primary-text);
      background-color: var(--white);
    }
    
    body.mobile-menu-open {
      overflow: hidden;
    }

    .container {
      width: 100%;
      max-width: var(--container-width);
      margin: 0 auto;
      padding: 0 var(--spacing-md);
    }

    /* Typography */
    h1, h2, h3, h4, h5, h6 {
      font-family: var(--heading-font), sans-serif;
      font-weight: 500;
      margin-bottom: var(--spacing-md);
    }

    h1 {
      font-size: 2.5rem; /* 40px */
    }

    h2 {
      font-size: 1.875rem; /* 30px */
    }

    p {
      margin-bottom: var(--spacing-md);
    }

    a {
      color: var(--primary-text);
      text-decoration: none;
    }

    /* Header */
    .site-header {
      padding: var(--spacing-lg) 0;
    }

    .header-container {
      display: flex;
      justify-content: flex-end;
      align-items: center;
    }

    .header-flex-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .mobile-header {
      display: none;
    }

    .desktop-nav ul {
      display: flex;
      list-style: none;
      gap: var(--spacing-lg);
    }

    .desktop-nav a {
      font-family: var(--heading-font), sans-serif;
      font-size: 1.875rem; /* 30px */
      font-weight: 500;
    }

    /* Mobile Menu Styles included via component */

    /* Terms & Conditions */
    .terms-wrapper {
      display: flex;
      margin-bottom: var(--spacing-xl);
    }

    .terms-header {
      margin-bottom: var(--spacing-xl);
      padding-left: var(--spacing-lg);
    }

    .effective-date {
      font-size: 1rem;
      margin-top: -1rem;
      margin-bottom: var(--spacing-xl);
    }

    /* Table of Contents */
    .terms-toc {
      width: 25%;
      padding-right: var(--spacing-lg);
      padding-left: var(--spacing-lg);
    }

    .terms-toc h2 {
      font-size: 1.25rem;
      margin-bottom: var(--spacing-md);
    }

    .terms-toc ul {
      list-style: none;
    }

    .terms-toc li {
      margin-bottom: var(--spacing-sm);
      padding: var(--spacing-sm) var(--spacing-md);
    }

    .terms-toc li.active {
      background-color: var(--charcoal);
      border-radius: 15px;
    }

    .terms-toc li.active a {
      color: var(--white);
    }

    /* Content sections */
    .terms-content {
      width: 75%;
      padding-left: var(--spacing-lg);
    }

    .terms-section {
      margin-bottom: var(--spacing-xl);
    }

    .terms-section h2 {
      margin-bottom: var(--spacing-md);
    }
    
    .terms-section h3 {
      margin-top: var(--spacing-lg);
      margin-bottom: var(--spacing-sm);
      font-weight: 500;
    }

    .info-text {
      font-weight: 400;
      margin-bottom: var(--spacing-md);
    }
    
    /* Terms and Conditions Styling */
    .numbered-heading {
      font-weight: 500;
      font-size: 1.2rem;
      margin-top: var(--spacing-lg);
      margin-bottom: var(--spacing-sm);
    }

    .numbered-item {
      margin-left: 1rem;
      margin-bottom: 0.5rem;
    }

    .sub-numbered-item {
      margin-left: 2rem;
      margin-bottom: 0.5rem;
    }

    /* Legacy list styling (keeping for backward compatibility) */
    .terms-list {
      margin-left: 1.5rem;
      margin-bottom: var(--spacing-md);
      list-style-type: decimal;
    }
    
    .sub-terms-list {
      margin-left: 1.5rem;
      margin-top: var(--spacing-sm);
      margin-bottom: var(--spacing-sm);
      list-style-type: lower-alpha;
    }
    
    .terms-list li, .sub-terms-list li {
      margin-bottom: 0.5rem;
    }
    
    /* Privacy Policy List Styling */
    .terms-content ul {
      margin-left: 1.5rem;
      margin-bottom: var(--spacing-md);
      list-style-type: disc;
    }
    
    .terms-content ul li {
      margin-bottom: 0.5rem;
    }
    
    /* For nested terms-content divs */
    .terms-content .terms-content {
      width: 100%;
      padding-left: 0;
    }

    /* Footer */
    .site-footer {
      padding: var(--spacing-xl) 0;
      margin-top: var(--spacing-xl);
      width: 100%;
    }

    .footer-container {
      padding-left: var(--spacing-lg);
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .contact-info {
      margin-bottom: var(--spacing-xl);
      text-align: center;
    }

    .contact-info h2 {
      font-size: 1.5rem; /* 24px */
      margin-bottom: var(--spacing-sm);
    }

    .social-links {
      margin-bottom: var(--spacing-xl);
      text-align: center;
    }
    
    .social-links h2 {
      font-size: 2.5rem; /* 40px */
      margin-bottom: var(--spacing-md);
    }

    .social-icons {
      display: flex;
      justify-content: center;
      gap: var(--spacing-md);
    }

    .social-icon {
      display: block;
    }
    
    .social-icon img {
      width: 52px;
      height: 52px;
    }
    
    /* Copyright and legal links at bottom */
    .footer-bottom {
      width: 100%;
      display: flex;
      justify-content: space-between;
      font-size: 0.75rem;
      font-weight: 500;
      margin-top: var(--spacing-lg);
    }
    
    .legal-links {
      display: flex;
      gap: var(--spacing-md);
    }
    
    /* Footer links color reset */
    
    /* Mobile adjustments */
    @media (max-width: 767px) {
      .footer-container {
        padding-left: var(--spacing-md);
        padding-right: var(--spacing-md);
      }
      
      .contact-info h2 {
        font-size: 1.25rem;
      }
      
      .social-links h2 {
        font-size: 2rem;
      }
      
      .social-icon img {
        width: 40px;
        height: 40px;
      }
      
      .footer-bottom {
        flex-direction: column;
        align-items: center;
        gap: var(--spacing-md);
      }
    }

    /* Responsive styles */
    @media (max-width: 1023px) {
      h1 {
        font-size: 2.25rem; /* 36px */
      }

      h2 {
        font-size: 1.75rem; /* 28px */
      }

      .social-links h2 {
        font-size: 2.25rem; /* 36px */
      }
    }

    @media (max-width: 767px) {
      .header-flex-container {
        display: none;
      }
      .desktop-nav {
        display: none;
      }

      .mobile-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: var(--spacing-md) 0;
      }

      .logo {
        font-family: var(--heading-font), sans-serif;
        font-size: 1.5rem;
        font-weight: 500;
      }

      .menu-toggle {
        display: block;
        width: 30px;
        height: 30px;
        background: none;
        border: none;
        cursor: pointer;
        position: relative;
      }

      .menu-icon, 
      .menu-icon::before, 
      .menu-icon::after {
        display: block;
        width: 100%;
        height: 2px;
        background-color: var(--charcoal);
        position: absolute;
        transition: all 0.3s;
      }

      .menu-icon {
        top: 50%;
        transform: translateY(-50%);
      }

      .menu-icon::before {
        content: "";
        top: -8px;
      }

      .menu-icon::after {
        content: "";
        bottom: -8px;
      }

      .terms-wrapper {
        flex-direction: column;
      }

      .terms-toc {
        display: none;
      }

      .terms-content {
        width: 100%;
        padding-left: 0;
      }

      h1 {
        font-size: 2rem; /* 32px */
      }

      h2 {
        font-size: 1.5rem; /* 24px */
      }
      
      /* Ensure the mobile footer is displayed and desktop is hidden */
      .footer-desktop {
        display: none;
      }
      
      .footer-mobile {
        display: block;
      }
      
      /* Proper spacing for mobile footer */
      .social-icons-wrapper {
        margin-bottom: var(--spacing-md);
      }
      
      .footer-bottom {
        flex-direction: column;
        gap: var(--spacing-md);
        align-items: center;
      }
      
      .legal-links {
        justify-content: center;
      }
    }
  </style>
</head>
<body>
  @include('components.mobile-menu-styles')
  @include('components.site-header')
  @include('components.mobile-menu')

  <div class="container">
    <div class="terms-header">
      <h1>Terms & Conditions</h1>
      <p class="effective-date">Effective date: April 3, 2025</p>
    </div>
    
    <div class="terms-wrapper">
      <!-- Desktop Table of Contents -->
      <nav class="terms-toc">
        <h2>Table of contents</h2>
        <ul>
          <li class="active"><a href="#aeyia">Terms of Use</a></li>
          <li><a href="#privacy-policy">Privacy Policy</a></li>
        </ul>
      </nav>
      
      <!-- Content sections -->
      <div class="terms-content">
        <section id="aeyia" class="terms-section">
          <h2>AEYIA – Website Terms of Use</h2>
          
          <div class="terms-content">
            <p class="numbered-heading">1. General</p>
            <p class="numbered-item">1.1 This website at https://www.aeyia.com (<strong>Site</strong>) is a website operated by AEYIA Society Ltd ACN 628 727 542 (<strong>AEYIA, us or we</strong>).</p>
            <p class="numbered-item">1.2 We may provide digital content (<strong>Content</strong>) and/or offer products for purchase whether by the Site or by other means (<strong>Products</strong>) and provide services offered from time to time, whether by the Site or by other means (<strong>Services</strong>).</p>
            <p class="numbered-item">1.3 Please read these terms and conditions before accessing or using the Site, and before viewing or using Content or purchasing Products or Services. If you are under 18 years of age, then you must obtain your parent or guardian's consent before accessing and using the Site, Content, Products and Services.</p>
            <p class="numbered-item">1.4 Your access to and use of the Site, access to Content and your purchase of Products and/or Services (howsoever occurring including where Content, Products or Services are provided free of charge, as a gift, via a third party or via any other means) is subject to these terms and conditions and by doing so you agree to be bound by these terms and conditions, as updated from time to time.</p>
            <p class="numbered-item">1.5 Where you acquire Products or Services from us the 'Standard Terms of Business' on the Site shall apply.</p>

            <p class="numbered-heading">2. Disclaimer</p>
            <p>The information contained in this Site and in any Content, Products or Services or otherwise communicated by us is provided in good faith on an "as is" basis. AEYIA does not represent or warrant the reliability, accuracy or completeness of the information contained on this Site and/or in Content, Products or Services or otherwise communicated by us and does not claim, represent or warrant the suitability of any Content, Products or Services or other information for any person or their individual circumstances. Our Content is intended to spark conversations and provide support and education on social and political ideas. Our Content is a learning aid and guide only and is not a substitute for professional advice. AEYIA strongly advises you to obtain professional advice pertaining to your needs, conditions and circumstances. To the extent permitted by law, AEYIA is not responsible or liable for any Liabilities arising in any way (including without limitation negligence) as a result of your use or reliance upon the Content, Products, Services or other information communicated by us or arising due to errors in, or omissions from, the information in this Site or the Content.</p>

            <p class="numbered-heading">3. Intellectual Property</p>
            <p class="numbered-item">3.1 You:</p>
            <p class="sub-numbered-item">3.1.1 acknowledge that the copyright in the Site, the software, design, text and graphics comprised in the Site, the selection and layout of the Site and the Content, Products and Services are owned by or licensed to us;</p>
            <p class="sub-numbered-item">3.1.2 must not modify, copy, adapt, store in a retrieval system, reproduce, upload, post, transmit, sell, distribute in any way or communicate to the public any Content without our prior written consent; and</p>
            <p class="sub-numbered-item">3.1.3 must not frame or embed in another website any of the material appearing on this Site or the Content without our prior written consent.</p>

            <p class="numbered-item">3.2 You may:</p>
            <p class="sub-numbered-item">3.2.1 store a reproduction of the Site on your local computer for the sole purpose of viewing the Content; and</p>
            <p class="sub-numbered-item">3.2.2 print hard copies of the Site, Content, Products and Services (as relevant) for the sole purpose of your own personal use, excluding commercial use.</p>

            <p class="numbered-item">3.3 This Site, the Content, Products and the Services and any other information, materials or documents owned or used by AEYIA in connection with the provision of the Content, Products and Services and promotion of its business contain registered trademarks which are protected by law and other branding, images, content which constitute the intellectual property of AEYIA. You must not use any of the marks or trademarks appearing on the Site or our name or the names of our related bodies corporate or any of our intellectual property without our prior written consent.</p>

            <p class="numbered-heading">4. Viruses</p>
            <p class="numbered-item">4.1 AEYIA does not claim that any information (including any files) obtained from or through this Site is free from viruses or other faults or defects.</p>
            <p class="numbered-item">4.2 You are responsible for scanning any information for viruses.</p>
            <p class="numbered-item">4.3 You agree that AEYIA has no responsibility or Liability to you or any other person for any loss or damage (whether direct, indirect, consequential or economic), regardless of cause, negligence or otherwise, which may be the direct or indirect result of any such information provided via this Site.</p>
            <p class="numbered-item">4.4 If AEYIA is found to be liable for such Liabilities this will be limited to the cost of supplying the information again.</p>

            <p class="numbered-heading">5. Compliance with these Terms and Conditions</p>
            <p class="numbered-item">5.1 You agree to bound by, and comply with, these terms and conditions by:</p>
            <p class="sub-numbered-item">5.1.1 using the Site;</p>
            <p class="sub-numbered-item">5.1.2 accessing and/or using the Content or other information or materials communicated by us;</p>
            <p class="sub-numbered-item">5.1.3 purchasing, participating in and/or using any Products and/or Services,</p>
            <p>whether you do so from us using the Site or by any other method of sale or where you receive Content, Products, Services or other information or materials communicated by us as a gift, or where received or accessed via any third party or other means.</p>

            <p class="numbered-heading">6. Changes to these Terms and Conditions</p>
            <p class="numbered-item">6.1 If you have placed an order for Products or Services that has been accepted by us or where you have accessed and/or used Products, Services, Content or other information or materials communicated by us, the terms and conditions that will apply are the terms and conditions that applied at the time of supply, access or use.</p>
            <p class="numbered-item">6.2 Subject to clause 6.1, we may change these terms and conditions at any time, and such modifications will be effective as soon as they are posted. By continuing to use the Site after these terms and conditions have been modified, you agree to be bound by the changes to these terms and conditions.</p>

            <p class="numbered-heading">7. Registration</p>
            <p>You must fully complete the registration process (if any) through the Site as required from time to time in order to access Content and/or purchase Products or Services. Any personal information that you give us will be held and used by us in accordance with our Privacy Policy contained on this Site.</p>

            <p class="numbered-heading">8. Purchasing Products or Services</p>
            <p class="numbered-item">8.1 You may purchase Products or Services through the Site in accordance with these terms and conditions.</p>
            <p class="numbered-item">8.2 Any purchase of Products or Services is an offer by you to purchase the Products or Services for the price notified (including any delivery or other charges and taxes) at the time you place the request.</p>
            <p class="numbered-item">8.3 We may ask you to provide additional details or require you to confirm your details to enable us to process your purchase through the Site.</p>
            <p class="numbered-item">8.4 You agree to provide us with current, complete and accurate details when asked to do so by the Site.</p>

            <p class="numbered-heading">9. Acceptance or Rejection of an Order</p>
            <p class="numbered-item">9.1 We reserve the right to accept or reject your order for any reason, including (without limitation) if the requested Product or Services is not available (or fully booked), if there is an error in the price or the description posted on the Site.</p>
            <p class="numbered-item">9.2 Each purchase through the Site or any other means that we accept results in a separate binding agreement between you and us for the supply of those Products or Services. For each order accepted by us, we will supply the Products or Services in that order to you in accordance with these terms and conditions.</p>
            <p class="numbered-item">9.3 If we reject an order placed through the Site, then we will endeavour to notify you of that rejection at the time you purchase the Products or Services or within a reasonable time thereafter.</p>

            <p class="numbered-heading">10. Cancelling, Changing or Postponing (by Us)</p>
            <p class="numbered-item">10.1 Prior to the delivery of a Product or Services (or the commencement of a course or event as applicable), we may cancel, change or postpone delivery of a Product or Service without any liability to you if:</p>
            <p class="sub-numbered-item">10.1.1 the requested Product or Service is not available, undersold or oversold;</p>
            <p class="sub-numbered-item">10.1.2 the requested Product or Service needs to be postponed or changed for any reason outside our reasonable control;</p>
            <p class="sub-numbered-item">10.1.3 there is an error in the price or the description posted on the Site or in any other sales platform in relation to the relevant Product or Services; or</p>
            <p class="sub-numbered-item">10.1.4 your order or conduct is in breach of these terms and conditions.</p>
            <p class="numbered-item">10.2 If we do cancel, change or postpone your Product or Service, then we will endeavor to provide you with reasonable notice of that cancellation, change or postponement, and will provide you with a credit voucher, similar Product or Service, or the same Product or Service at a later date suitable to you, or a refund, provided that you are not at fault or in breach of these terms and conditions.</p>

            <p class="numbered-heading">11. Cancelling or Requesting to change an Order (by You)</p>
            <p class="numbered-item">11.1 Orders may not be cancelled once payment has been submitted via this Site or via any other method of sale. However, should you wish to change a Product or Service, please Contact Us and we will endeavor to assist you.</p>

            <p class="numbered-heading">12. Delivery of Courses, Events, Seminars, Workshops, Sessions etc</p>
            <p>Information on times, locations and other key information regarding courses, events, seminars, workshops, sessions or other similar types of Services is set out on this Site.</p>

            <p class="numbered-heading">13. Prices, Fees and Charges</p>
            <p class="numbered-item">13.1 The prices of Products and Services and other charges displayed on this Site are current at the time of issue, however, AEYIA reserves the right to change prices at any time before we accept an order from you.</p>
            <p class="numbered-item">13.2 All prices shown on this Site are in Australian Dollars (AUD).</p>
            <p class="numbered-item">13.3 All fees and charges identified in these terms and conditions and all prices for the Products and Services as shown on the Site are inclusive of GST (unless otherwise indicated).</p>

            <p class="numbered-heading">14. Your Obligations</p>
            <p class="numbered-item">14.1 You covenant and warrant that:</p>
            <p class="sub-numbered-item">14.1.1 all information and data provided by you to us through the Site (including as part of the order process) or otherwise is true, accurate, complete and up to date;</p>
            <p class="sub-numbered-item">14.1.2 the person purchasing and/or using the Content, Products and/or Services will be over 18 years of age;</p>
            <p class="sub-numbered-item">14.1.3 you have and will comply with all relevant laws relating to your use of the Site, the Content and your purchase of Products and Services;</p>
            <p class="sub-numbered-item">14.1.4 you will ensure that your LoginID and password that is used to access the Site and the details of your account is kept in a safe and secure manner;</p>
            <p class="sub-numbered-item">14.1.5 you will promptly notify us if you are or become aware that there is or has been an unauthorised use of your LoginID and password or account, or any other security breach relating to your account;</p>
            <p class="sub-numbered-item">14.1.6 you will promptly advise us of any changes to your information provided to us as part of the enrolment registration process;</p>
            <p class="sub-numbered-item">14.1.7 you are responsible for any costs associated with your access to or use of the Site, including Internet access fees;</p>
            <p class="sub-numbered-item">14.1.8 you are responsible and liable for any person that uses your LoginID and password to purchase Products and Services through the Site;</p>
            <p class="sub-numbered-item">14.1.9 you agree that we may charge you for all Products and Services that we agree to supply to you that have been ordered using your LoginID and password through the Site.</p>

            <p class="numbered-item">14.2 You must not:</p>
            <p class="sub-numbered-item">14.2.1 use the Site, Content, Products or Services for any activities that breach any laws, infringe a third party's rights or are contrary to any relevant standards or codes;</p>
            <p class="sub-numbered-item">14.2.2 use the Site in a manner or way, or post to or transmit to or via the Site any material, which interferes with other users or our other customers or defames, harasses, threatens, menaces or offends any person or which prevents any other person from using or enjoying the Site;</p>
            <p class="sub-numbered-item">14.2.3 make fraudulent or speculative enquiries, purchases or requests through the Site;</p>
            <p class="sub-numbered-item">14.2.4 use another person's details without their permission or impersonate another person when using the Site;</p>
            <p class="sub-numbered-item">14.2.5 post or transmit any obscene, indecent, inflammatory or pornographic material or any other material that may give rise to civil or criminal proceedings;</p>
            <p class="sub-numbered-item">14.2.6 tamper with or hinder the operation of the Site;</p>
            <p class="sub-numbered-item">14.2.7 knowingly transmit any viruses, worms, defects, trojan horses or similar disabling or malicious code to the Site;</p>
            <p class="sub-numbered-item">14.2.8 use any robot, spider, site search and retrieval application or other mechanism to retrieve or index any portion of the Site;</p>
            <p class="sub-numbered-item">14.2.9 modify, adapt, translate or reverse engineer any portion of the Site;</p>
            <p class="sub-numbered-item">14.2.10 remove any copyright, trade mark or other proprietary rights notices contained in or on the Site;</p>
            <p class="sub-numbered-item">14.2.11 reformat or frame any portion of the web pages that are part of the Site;</p>
            <p class="sub-numbered-item">14.2.12 create accounts by automated means or under false or fraudulent pretences;</p>
            <p class="sub-numbered-item">14.2.13 use the Site to violate the security of any computer or other network or engage in illegal conduct;</p>
            <p class="sub-numbered-item">14.2.14 take any action that imposes or that would, in our reasonable opinion, result in an unreasonable or disproportionately large load on our infrastructure;</p>
            <p class="sub-numbered-item">14.2.15 use the Site other than in accordance with these terms and conditions; or</p>
            <p class="sub-numbered-item">14.2.16 attempt any of the above acts or engage or permit another person to do any of the above acts.</p>

            <p class="numbered-heading">15. Warranty and Liability</p>
            <p class="numbered-item">15.1 AEYIA accepts liability for all legal guarantees and warranties expressed or implied to the transactions under the Australian Consumer Law in Schedule 2 of the Competition and Consumer Act 2010 (Cth), or any other legislation (such as the Fair Trading Acts (or equivalent legislation) in each State and Territory) the effect of which cannot be excluded.</p>
            <p class="numbered-item">15.2 Where we are permitted by law (and subject to clause 15.1):</p>
            <p class="sub-numbered-item">15.2.1 we do not warrant or represent the suitability of the Site, Materials, Content, Products, Services or any other advice, opinions, information or materials howsoever communicated by us for any purpose;</p>
            <p class="sub-numbered-item">15.2.2 we will not be liable to you or any other person for any Liabilities, damage, injury, harm, loss, costs, expenses, claims, indirect and consequential loss (including without limitation for loss of revenue, loss of profits, failure to realise expected profits or savings and any other commercial or economic loss of any kind) or loss or corruption of data, in contract, tort, under any statute or otherwise (including negligence) arising from or connected to the Site, your purchase and/or use of the Products or Services and/or reliance by you or any other party on the Content any other advice, opinions, information or materials howsoever communicated by us; and</p>
            <p class="sub-numbered-item">15.2.3 we limit our liability to the cost of the Products or Services purchased.</p>
            <p class="numbered-item">15.3 Our liability to you for loss or damage of any kind arising out of this agreement or in connection with the relationship established by it is reduced to the extent (if any) that you cause or contribute to the loss or damage. This reduction applies whether our liability is in contract, tort (including negligence), under any statute or otherwise.</p>

            <p class="numbered-heading">16. Termination and/or Suspension of Account</p>
            <p>We may immediately suspend, terminate or limit your access to and use of the Site and (where relevant) your account if we reasonably suspect that you have commit fraudulent act and/or you breach these terms and conditions.</p>

            <p class="numbered-heading">17. General Provisions</p>
            <p class="numbered-item">17.1 If the whole or any part of a provision of this agreement is void, unenforceable or illegal in a jurisdiction it is severed for that jurisdiction. The remainder of this agreement has full force and effect and the validity or enforceability of that provision in any other jurisdiction is not affected. This clause has no effect if the severance alters the basic nature of this agreement or is contrary to public policy.</p>
            <p class="numbered-item">17.2 This agreement is governed by the laws of Australia. Each party submits to the non-exclusive jurisdiction of the courts of that place.</p>

            <p class="numbered-heading">18. Privacy Policy and Your Personal Information</p>
            <p>Refer to the Privacy Policy, which form part of these terms and conditions.</p>

            <p class="numbered-heading">19. Definitions</p>
            <p class="numbered-item">19.1 Capitalised terms used are defined in these terms and conditions.</p>
            <p class="numbered-item">19.2 In these terms:</p>
            <p class="sub-numbered-item">19.2.1 "AEYIA" is taken to mean AEYIA Society Ltd (ACN 628 727 542) but also includes its directors, associates, employees, agents, contractors, partners and related persons and bodies corporate.</p>
            <p class="sub-numbered-item">19.2.2 "GST" has the meaning it has in the A New Tax System (Goods and Services Tax) Act 1999 (Cth)</p>
            <p class="sub-numbered-item">19.2.3 "Liabilities" means all direct and/or indirect liability for: costs; damages; losses; claims, causes of action, accidents; injuries; deaths; law and traffic violations; and expenses including but not limited to legal fees.</p>
            <p class="sub-numbered-item">19.2.4 "LoginID" means the email address that you provided to us as part of the registration process to use the Site.</p>
          </div>
        </section>
        
        <section id="privacy-policy" class="terms-section">
          <h2>AEYIA Society Ltd</h2>
          <h3>Privacy Policy</h3>
          
          <p>This is the policy of AEYIA Society Ltd (ACN 628 727 542) (<strong>AEYIA, or our or we</strong>) for dealing with your personal information (<strong>Privacy Policy</strong>).</p>
          
          <div class="terms-content">
            <h3>Our business and the purpose of collection</h3>
            <p>AEYIA will provide a platform for the connection of practitioners across various aspects of life with users interested in using their services together with provision of digital content (<strong>Content</strong>) and related products and services (<strong>Products and Services</strong>). We collect personal information at this stage primarily for direct and indirect marketing and in the future to provide the Content, Products and Services to you (<strong>Purpose</strong>).</p>
            
            <p>We may disclose additional purposes for collection of your personal information in collection statements at the point of collection.</p>
            
            <h3>Personal information we collect</h3>
            <p>When used in this policy, "personal information" has the meaning given to that term in the Privacy Act 1988 (Cth). We may collect the following types of personal information from you:</p>
            
            <ul>
              <li>name;</li>
              <li>residential or business address;</li>
              <li>email address;</li>
              <li>post code;</li>
              <li>financial and payment information;</li>
              <li>gender;</li>
              <li>age and date of birth;</li>
              <li>signature;</li>
              <li>telephone number;</li>
              <li>businesses you operate; and</li>
              <li>your personal preferences, thoughts, ideas, goals and opinions.</li>
            </ul>
            
            <h3>Sensitive information</h3>
            <p>Sensitive information is information about you that reveals your racial or ethnic origin, political opinions, religious or philosophical beliefs or affiliations, membership of a professional or trade association, membership of a trade union, details of health, disability, sexual orientation or criminal record.</p>
            
            <p>It is our policy to only collect your sensitive information where it is reasonably necessary for our functions or activities and either you have consented, or we are required or authorised under law to do so.</p>
            
            <h3>How we collect your personal information</h3>
            <p>Collection of your personal information can occur through the following interactions:</p>
            
            <ul>
              <li>when you communicate with us directly (by email, in person, telephone, direct mail or any other means);</li>
              <li>when we interact with you during the provision of Content or in relation to any other Products or Services; and/or</li>
              <li>when you visit our website and social media pages, or access or contribute to digital platforms and applications managed by us (Online Platforms).</li>
            </ul>
            
            <h3>Cookies</h3>
            <p>We may use temporary (session) cookies or permanent cookies when you access our Online Platforms. This allows us to recognise your browser and track the web pages you have visited.</p>
            
            <p>You can switch off cookies by adjusting the settings on your web browser.</p>
            
            <h3>How we hold your personal information</h3>
            <p>We may hold your personal information in either electronic or hard copy form.</p>
            
            <p>If you provide information to us electronically, we retain this information in our computer systems and databases. If you provide information to us in hard copy (paper) this information is normally retained in our files and a copy is made to our electronic files.</p>
            
            <h3>Security</h3>
            <p>We use industry standard security measures to safeguard and protect your information.</p>
            
            <h3>If we are unable to collect your personal information</h3>
            <p>If we are unable to collect your personal information, some or all of the following may occur:</p>
            
            <ul>
              <li>we may be unable to provide the Content, Products and Services to you;</li>
              <li>we may be unable to communicate with you to provide information about the Content, Products or Services that you have procured from us, or may intend to procure in the future;</li>
              <li>we may be unable to tailor the content of our marketing communications to suit your preferences;</li>
              <li>your experience when interacting with us may be delayed or not as efficient as you may expect.</li>
            </ul>
            
            <h3>Disclosure of your personal information</h3>
            <p>Your personal information may be disclosed in connection with any Purpose to any of the following:</p>
            
            <ul>
              <li>our employees, contractors or service providers, to the extent reasonably necessary to fulfil our obligations to you;</li>
              <li>our business advisors, including lawyers, accountants or other professional service providers, to the extent reasonably required;</li>
              <li>suppliers, clients and other third parties with whom we have commercial relationships, for business, payment processing, delivery, marketing and related purposes;</li>
              <li>if required by law, to any person authorised by such law.</li>
            </ul>
            
            <h3>Overseas disclosure of personal information</h3>
            <p>We may disclose your personal information to third parties and service providers located overseas in connection with any Purpose, including to overseas cloud computing hosts. We take reasonable steps to ensure that the overseas recipients of your personal information do not breach the privacy obligations relating to your personal information.</p>
            
            <h3>Links</h3>
            <p>Links from our Online Platforms to third party websites that we do not operate or control are provided for your convenience. We are not responsible for the privacy or security practices of websites that are not covered by this Privacy Policy. Third party websites should have their own privacy and security policies which we encourage you to read before supplying any personal information to them.</p>
            
            <h3>Direct Marketing</h3>
            <p>We may contact you with direct marketing communications and information about Content, Products and Services offered by us or our partners via telephone, email, SMS, or regular mail.</p>
            
            <p>If you have indicated a preference for a method of communication, we will endeavour to use that method wherever practical to do so.</p>
            
            <p>You may opt out of receiving marketing communications at any time by responding via the channel in which you received the marketing communication, or by contacting us (see contact information below).  You can unsubscribe from emails by clicking the unsubscribe link on the footer of the email communication you have received.</p>
            
            <h3>How you may access your information</h3>
            <p>You may access your personal information held by AEYIA by making a request to us.</p>
            
            <p>Email: legal@aeyia.com</p>
            
            <h3>Correction of your personal information</h3>
            <p>If you would like us to update or amend your personal information, please contact us and we will make the requested amendments.</p>
            
            <p>We may ask you to verify your identity to ensure that personal information we hold is not improperly accessed.</p>
            
            <h3>Complaints</h3>
            <p>If you feel your privacy has been breached, please contact us using the contact information above setting out the circumstances and reasons for your complaint.</p>
          </div>
        </section>
      </div>
    </div>
  </div>

  <footer class="site-footer">
    <div class="container">
      <div class="footer-container">
        <div class="contact-info">
          <h2>Need More Info?</h2>
          <a href="mailto:legal@aeyia.com">legal@aeyia.com</a>
        </div>
        
        <div class="social-links">
          <h2>Follow us.</h2>
          <div class="social-icons">
            <a href="//www.facebook.com/aeyia.au" target="_blank" class="social-icon">
              <img src="/images/landing/social-facebook.png" alt="Facebook" style="filter: brightness(0);">
            </a>
            <a href="//www.instagram.com/aeyia_/" target="_blank" class="social-icon">
              <img src="/images/landing/social-instagram.png" alt="Instagram" style="filter: brightness(0);">
            </a>
            <a href="//www.youtube.com/@AEYIAWellness" target="_blank" class="social-icon">
              <img src="/images/landing/social-youtube.png" alt="YouTube" style="filter: brightness(0);">
            </a>
          </div>
        </div>
        
        <!-- Copyright and Legal Links -->
        <div class="footer-bottom">
          <div class="copyright">
            <p>&copy; AEYIA {{ date('Y') }}</p>
          </div>
          <div class="legal-links">
            <a href="/terms">Terms & Conditions</a>
            <a href="/terms#privacy-policy">Privacy Policy</a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script>
    // Table of contents navigation
    document.addEventListener('DOMContentLoaded', function() {
      console.log('DOM loaded in terms-conditions');

      // Initialize mobile menu - ensure this runs after the DOM is fully loaded
      setTimeout(function() {
        console.log('Attempting to initialize mobile menu');
        if (typeof window.initMobileMenu === 'function') {
          console.log('InitMobileMenu function found, calling it');
          window.initMobileMenu();
        } else {
          console.log('InitMobileMenu function not found');
        }
      }, 200);

      const tocLinks = document.querySelectorAll('.terms-toc a');
      tocLinks.forEach(link => {
        link.addEventListener('click', function(e) {
          // Remove active class from all links
          document.querySelectorAll('.terms-toc li').forEach(item => {
            item.classList.remove('active');
          });
          
          // Add active class to parent li
          this.closest('li').classList.add('active');
          
          // Smooth scroll to section (simple version)
          const targetId = this.getAttribute('href');
          const targetElement = document.querySelector(targetId);
          if (targetElement) {
            e.preventDefault();
            window.scrollTo({
              top: targetElement.offsetTop - 100,
              behavior: 'smooth'
            });
          }
        });
      });

      // Manually ensure the menu toggle button works
      const menuToggle = document.getElementById('mobile-menu-toggle');
      const mobileMenu = document.getElementById('mobile-menu');
      if (menuToggle && mobileMenu) {
        console.log('Adding direct click handler to mobile menu toggle');
        menuToggle.addEventListener('click', function() {
          console.log('Mobile menu toggle clicked');
          mobileMenu.classList.add('active');
          document.body.classList.add('mobile-menu-open');
        });
      }
    });
  </script>
</body>
</html>
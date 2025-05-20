<script setup>
import { Head } from '@inertiajs/vue3';
import { ref, reactive, computed } from 'vue';

// Define team members array
const teamMembers = [
    { name: 'Leah Rettenmaier', email: 'leah@aeyia.com', phone: '0412589075' },
    { name: 'Kurtis Rettenmaier', email: 'kurt@aeyia.com', phone: '0432525567' },
    { name: 'Michael Dundas', email: 'michael@aeyia.com', phone: '0418922321' },
    { name: 'Sarah Thompson', email: 'sarah@aeyia.com', phone: '0435870220' },
    { name: 'Jerram Watters', email: 'jerram@aeyia.com', phone: '0402569390' },
    { name: 'Silvia Martini', email: 'silvia@aeyia.com', phone: '0420525918' },
    { name: 'Ryan Barraclough', email: 'ryan@aeyia.com', phone: '0420987054' },
    { name: 'Mia Weber', email: 'mia@aeyia.com', phone: '0412205944' },
    { name: 'Mitch Barraclough', email: 'mitch@aeyia.com', phone: '0431283271' }
];

// S3 bucket URL
const s3BaseUrl = "https://aeyia-email-signatures.s3.ap-southeast-2.amazonaws.com";

// State variables
const selectedMember = ref(null);
const signatureHtml = ref('');
const copySuccess = ref(false);
const showAlternativeOptions = ref(false);

// Generate the signature HTML
const generateSignature = (name, email, phone) => {
    return `
<div style="font-family: Arial, Helvetica, sans-serif; color: #212026; max-width: 600px;">
    <table cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse;">
        <tr>
            <!-- Name and Social Icons Column -->
            <td style="vertical-align: top;">
                <div style="font-size: 17pt; color: #212026; font-weight: normal; padding-bottom: 5px;">${name}</div>
                <div style="padding-top: 5px;">
                    <a href="https://www.instagram.com/aeyia_/" style="text-decoration: none !important; display: inline-block; margin-right: 3px;">
                        <img src="${s3BaseUrl}/instagram.png" alt="Instagram" style="width: 21px; height: 21px; border: 0;">
                    </a>
                    <a href="http://www.facebook.com/aeyia.au" style="text-decoration: none !important; display: inline-block; margin-right: 3px;">
                        <img src="${s3BaseUrl}/facebook.png" alt="Facebook" style="width: 21px; height: 21px; border: 0;">
                    </a>
                    <a href="http://www.tiktok.com/@aeyia__" style="text-decoration: none !important; display: inline-block; margin-right: 3px;">
                        <img src="${s3BaseUrl}/tiktok.png" alt="TikTok" style="width: 21px; height: 21px; border: 0;">
                    </a>
                    <a href="https://www.youtube.com/@AEYIAWellness" style="text-decoration: none !important; display: inline-block;">
                        <img src="${s3BaseUrl}/youtube.png" alt="YouTube" style="width: 21px; height: 21px; border: 0;">
                    </a>
                </div>
            </td>

            <!-- Vertical Divider -->
            <td style="padding: 0 15px; vertical-align: top;">
                <div style="width: 2px; background-color: #aaa; height: 100%; min-height: 120px;"></div>
            </td>

            <!-- Contact Information Column -->
            <td style="vertical-align: top;">
                <div style="margin-bottom: 0px;">
                    <a href="tel:${phone}" style="text-decoration: none !important;">
                        <img src="${s3BaseUrl}/phone.png" alt="" style="width: 12px; height: 12px; vertical-align: middle; display: inline">&nbsp;
                        <span style="font-size: 8pt; color: #212026; vertical-align: middle;">${phone}</span>
                    </a>
                </div>
                <div style="margin-bottom: 0px;">
                    <a href="mailto:${email}" style="text-decoration: none !important;">
                        <img src="${s3BaseUrl}/mail.png" alt="" style="width: 12px; height: 12px; vertical-align: middle; display: inline">&nbsp;
                        <span style="font-size: 8pt; color: #212026; vertical-align: middle;">${email}</span>
                    </a>
                </div>
                <div style="margin-bottom: 0px;">
                    <a href="http://www.aeyia.com" style="text-decoration: none !important;">
                        <img src="${s3BaseUrl}/web.png" alt="" style="width: 12px; height: 12px; vertical-align: middle; display: inline">&nbsp;
                        <span style="font-size: 8pt; color: #212026; vertical-align: middle;">www.aeyia.com</span>
                    </a>
                </div>
                <div>
                    <a href="https://maps.google.com/?q=6/7 Grevillea Street, Byron Bay, NSW 2481" style="text-decoration: none !important;">
                        <img src="${s3BaseUrl}/map.png" alt="" style="width: 12px; height: 12px; vertical-align: middle; display: inline">&nbsp;
                        <span style="font-size: 8pt; color: #212026; vertical-align: middle;">6/7 Grevillea Street, Byron Bay, NSW 2481</span>
                    </a>
                </div>
            </td>
        </tr>
    </table>

    <!-- Logo row -->
    <table cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse; margin-top: 15px;">
        <tr>
            <td>
                <img src="${s3BaseUrl}/aeyia-logo.png" alt="AEYIA" style="width:100%; max-width: 350px; height: auto; border: 0;">
            </td>
        </tr>
    </table>

    <!-- Disclaimer text -->
    <table cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse; margin-top: 15px;">
        <tr>
            <td>
                <p style="font-size: 6pt; color: #808080; margin: 0; padding-bottom: 5px;">AEYIA respectfully acknowledges the Traditional Owners of the land on which we live and work. We pay our respects to Elders past, present, and future and recognise their ongoing connection to land, waters, and culture. Their wisdom and resilience continue to inspire and guide us.</p>
                <p style="font-size: 6pt; color: #808080; margin: 0; padding-bottom: 5px;">CONFIDENTIALITY NOTICE: The contents of this email are confidential to the ordinary user of the email address to which it is addressed and may also be privileged. If you are not the addressee of this email, you may not copy, forward, disclose or otherwise use it or any part of it in any form whatsoever. If you have received this email by error, please email the sender by replying to this message.</p>
                <p style="font-size: 6pt; color: #808080; margin: 0;">Please consider the environment before printing this e-mail.</p>
            </td>
        </tr>
    </table>
</div>`;
};

// Methods
const selectMember = (index) => {
    selectedMember.value = teamMembers[index];
    signatureHtml.value = generateSignature(
        selectedMember.value.name,
        selectedMember.value.email,
        selectedMember.value.phone
    );
    copySuccess.value = false;
    showAlternativeOptions.value = false;
};

const copyToClipboard = () => {
    try {
        const el = document.getElementById('signature-preview');
        const range = document.createRange();
        range.selectNodeContents(el);
        const sel = window.getSelection();
        sel.removeAllRanges();
        sel.addRange(range);

        const success = document.execCommand('copy');
        sel.removeAllRanges();

        if (success) {
            copySuccess.value = true;
            setTimeout(() => {
                copySuccess.value = false;
            }, 2000);
        } else {
            showAlternativeOptions.value = true;
        }
    } catch (err) {
        console.error('Copy failed:', err);
        showAlternativeOptions.value = true;
    }
};

const downloadSignature = () => {
    const htmlContent = document.getElementById('signature-preview').innerHTML;
    const blob = new Blob(['<html><head><title>AEYIA Email Signature</title></head><body>', htmlContent, '</body></html>'], {type: 'text/html'});
    const a = document.createElement('a');
    a.href = URL.createObjectURL(blob);
    a.download = 'aeyia-signature.html';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
};

// Computed properties
const getFirstName = (fullName) => {
    return fullName.split(' ')[0];
};
</script>

<template>
    <Head title="AEYIA Email Signature Generator" />
    <div class="body-container">
        <div class="container">
            <h1>AEYIA Email Signature Generator v2 - broken CSS</h1>

            <p>Tailwind CSS lib is replacing all handcoded email signature CSS with Tailwind CSS, and breaking the email signature in Gmail.</p>

            <div class="team-buttons">
                <button
                    v-for="(member, index) in teamMembers"
                    :key="index"
                    @click="selectMember(index)"
                    class="btn"
                >
                    {{ getFirstName(member.name) }}
                </button>
            </div>

            <div v-if="selectedMember" id="copy-section">
                <div class="success-message">
                    Signature generated for {{ selectedMember.name }}
                </div>
                <button id="copy-btn" class="copy-btn" @click="copyToClipboard">
                    {{ copySuccess ? 'Copied!' : 'Copy Signature to Clipboard' }}
                </button>
            </div>

            <div v-if="selectedMember" id="signature-preview" v-html="signatureHtml"></div>

            <div v-if="showAlternativeOptions" id="alternative-options">
                <div class="instructions">
                    <h3>Alternative Options:</h3>
                    <p>If the copy button didn't work, you can try these options:</p>
                    <ol>
                        <li>
                            <button @click="downloadSignature" class="btn download-btn">Download as HTML</button>
                            <span style="margin-left: 10px;">Download the signature as an HTML file and open in a browser</span>
                        </li>
                        <li style="margin-top: 10px;">
                            Manually select all content in the signature preview box above, copy with Ctrl+C (or Cmd+C on Mac)
                        </li>
                    </ol>
                </div>
            </div>

            <div v-if="selectedMember" class="instructions" id="instructions">
                <h3>How to add this signature to Gmail:</h3>
                <ol>
                    <li>Click the "Copy Signature to Clipboard" button above</li>
                    <li>In Gmail, click the gear icon in the top right, then "See all settings"</li>
                    <li>Scroll down to the "Signature" section</li>
                    <li>Click "Create new" or edit an existing signature</li>
                    <li>Paste the copied signature in the editor</li>
                    <li>Scroll down and click "Save Changes"</li>
                </ol>
                <p><strong>Note:</strong> This version uses Amazon S3 to host the signature images, ensuring they'll appear correctly for email recipients.</p>
            </div>
        </div>
    </div>
</template>

<style scoped>
.body-container {
    font-family: Arial, sans-serif;
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f5f5f5;
}
.container {
    background-color: white;
    border-radius: 8px;
    padding: 30px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}
h1 {
    color: #474747;
    margin-bottom: 25px;
    text-align: center;
}
.team-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 30px;
    justify-content: center;
}
.btn {
    background-color: #474747;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.2s;
    font-family: inherit;
    font-size: inherit;
}
.btn:hover {
    background-color: #666;
}
#signature-preview {
    margin-top: 20px;
    border: 1px solid #ddd;
    padding: 20px;
    border-radius: 5px;
}
.instructions {
    margin-top: 20px;
    padding: 15px;
    background-color: #f0f8ff;
    border-radius: 5px;
    border-left: 4px solid #4682b4;
}
.copy-btn {
    display: block;
    margin: 20px auto;
    background-color: #4682b4;
    padding: 12px 25px;
    font-size: 16px;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.2s;
}
.copy-btn:hover {
    background-color: #3a6d8f;
}
.download-btn {
    background-color: #4682b4;
}
.success-message {
    background-color: #dff0d8;
    color: #3c763d;
    padding: 10px;
    border-radius: 5px;
    margin: 10px 0;
    text-align: center;
}
.warning-message {
    background-color: #fcf8e3;
    color: #8a6d3b;
    padding: 10px;
    border-radius: 5px;
    margin: 10px 0;
    text-align: center;
}
</style>

@php
// Define team members array
$team_members = [
    ['name' => 'Leah Rettenmaier', 'email' => 'leah@aeyia.com', 'phone' => '0412589075'],
    ['name' => 'Kurtis Rettenmaier', 'email' => 'kurt@aeyia.com', 'phone' => '0432525567'],
    ['name' => 'Michael Dundas', 'email' => 'michael@aeyia.com', 'phone' => '0418922321'],
    ['name' => 'Sarah Thompson', 'email' => 'sarah@aeyia.com', 'phone' => '0435870220'],
    ['name' => 'Jerram Watters', 'email' => 'jerram@aeyia.com', 'phone' => '0402569390'],
    ['name' => 'Sylvia Martini', 'email' => 'sylvia@aeyia.com', 'phone' => '0420525918'],
    ['name' => 'Ryan Barraclough', 'email' => 'ryan@aeyia.com', 'phone' => '0420987054'],
    ['name' => 'Mia Weber', 'email' => 'mia@aeyia.com', 'phone' => '0412205944'],
    ['name' => 'Mitch Barraclough', 'email' => 'mitch@aeyia.com', 'phone' => '0431283271']
];

// Get selected team member if form submitted
$selectedMember = null;
$signatureHtml = '';

if (request()->has('member_id')) {
    $memberId = intval(request()->input('member_id'));
    if (isset($team_members[$memberId])) {
        $selectedMember = $team_members[$memberId];

        // Create signature HTML - using PHP to insert the dynamic values
        $signatureHtml = generateSignature(
            $selectedMember['name'],
            $selectedMember['email'],
            $selectedMember['phone']
        );
    }
}

// Function to generate the signature HTML
function generateSignature($name, $email, $phone) {
    // S3 BUCKET URL
    $s3BaseUrl = "https://aeyia-email-signatures.s3.ap-southeast-2.amazonaws.com";

    return '
<div style="font-family: Arial, Helvetica, sans-serif; color: #212025; width: 100%; max-width: 600px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;">
    <table cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse; width: 100%">
        <tr>
            <td style="vertical-align: top;">
                <div style="font-size: large !important; color: #212025; font-weight: normal;">' . htmlspecialchars($name) . '<span style="display:none"></br>Aeyia</span></div>

                <div style="padding-top: 15px;">
                    <a href="https://www.instagram.com/aeyia_/" style="text-decoration: none !important; display: inline-block; margin-right: 3px;">
                        <img src="' . $s3BaseUrl . '/instagram.png" alt="Instagram" style="width: 1.3rem !important; border: 0;">
                    </a>
                    <a href="http://www.facebook.com/aeyia.au" style="text-decoration: none !important; display: inline-block; margin-right: 3px;">
                        <img src="' . $s3BaseUrl . '/facebook.png" alt="Facebook" style="width: 1.3rem !important; border: 0;">
                    </a>
                    <a href="http://www.tiktok.com/@aeyia__" style="text-decoration: none !important; display: inline-block; margin-right: 3px;">
                        <img src="' . $s3BaseUrl . '/tiktok.png" alt="TikTok" style="width: 1.3rem !important; border: 0;">
                    </a>
                    <a href="https://www.youtube.com/@AEYIAWellness" style="text-decoration: none !important; display: inline-block;">
                        <img src="' . $s3BaseUrl . '/youtube.png" alt="YouTube" style="width: 1.3rem !important; border: 0;">
                    </a>
                </div>
            </td>

            <td style="padding: 0 15px; vertical-align: top;">
                <div style="width: 1px; background-color: #666666; height: 100%; min-height: 100px;"></div>
            </td>

            <td style="vertical-align: top;">
                <table cellpadding="0" cellspacing="0" border="0" style="vertical-align: -webkit-baseline-middle;">
                    <tbody>
                        <tr style="vertical-align: middle; height: 25px;">
                            <td width="30" style="vertical-align: middle;">
                                <img src="' . $s3BaseUrl . '/phone.png" alt="" style="width: 1.1rem !important; display: block;">
                            </td>
                            <td style="padding: 0px;">
                                <a href="tel:' . htmlspecialchars($phone) . '" style="font-size: small !important; color: #212025; text-decoration-line: none;">' . htmlspecialchars($phone) . '</a></span>
                            </td>
                        </tr>
                        <tr style="vertical-align: middle; height: 25px;">
                            <td width="30" style="vertical-align: middle;">
                                <img src="' . $s3BaseUrl . '/mail.png" alt="" style="width: 1.1rem !important; display: block;">
                            </td>
                            <td style="padding: 0px;">
                                <a href="mailto:' . htmlspecialchars($email) . '" style="font-size: small !important; color: #212025; text-decoration: none !important;">' . htmlspecialchars($email) . '</a>
                            </td>
                        </tr>
                        <tr style="vertical-align: middle; height: 25px;">
                            <td width="30" style="vertical-align: middle;">
                                <img src="' . $s3BaseUrl . '/web.png" alt="" style="width: 1.1rem !important; display: block;">
                            </td>
                            <td style="padding: 0px;">
                                <a href="http://www.aeyia.com" style="font-size: small !important; color: #212025; text-decoration: none !important;">www.aeyia.com</a>
                            </td>
                        </tr>
                        <tr style="vertical-align: middle; height: 25px;">
                            <td width="30" style="vertical-align: middle;">
                                <a href="https://maps.google.com/?q=6/7 Grevillea Street, Byron Bay, NSW 2481" style="text-decoration: none !important;" target="_blank">
                                    <img src="' . $s3BaseUrl . '/map.png" alt="" style="width: 1.1rem !important; display: block;">
                                </a>
                            </td>
                            <td style="padding: 0px;">
                                <a href="https://maps.google.com/?q=6/7 Grevillea Street, Byron Bay, NSW 2481" style="font-size: small !important; color: #212025; text-decoration: none !important;" target="_blank">
                                    6/7 Grevillea Street, Byron Bay
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>

    <!-- Logo row -->
    <table cellpadding="0" cellspacing="0" border="0" style="margin-top: 15px;" border=1 bg-color="red">
        <tr>
            <td>
                <img src="' . $s3BaseUrl . '/aeyia-logo.png" alt="AEYIA" style="max-width: 250px; height: auto; border: 0;">
            </td>
        </tr>
    </table>

    <!-- Disclaimer text -->
    <table cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse; margin-top: 15px;">
        <tr>
            <td>
                <p style="font-size: 10px !important; color: #808080; margin: 0; padding-bottom: 5px;">AEYIA respectfully acknowledges the Traditional Owners of the land on which we live and work. We pay our respects to Elders past, present, and future and recognise their ongoing connection to land, waters, and culture. Their wisdom and resilience continue to inspire and guide us.</p>
                <p style="font-size: 10px !important; color: #808080; margin: 0; padding-bottom: 5px;">CONFIDENTIALITY NOTICE: The contents of this email are confidential to the ordinary user of the email address to which it is addressed and may also be privileged. If you are not the addressee of this email, you may not copy, forward, disclose or otherwise use it or any part of it in any form whatsoever. If you have received this email by error, please email the sender by replying to this message.</p>
                <p style="font-size: 10px !important; color: #808080; margin: 0;">Please consider the environment before printing this e-mail. <br/>v0.11</p>
            </td>
        </tr>
    </table>
</div>';
}
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>AEYIA Email Signature Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
        }
        .container {
            padding: 0;
            width: 100%;
            max-width: 100%;
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
            padding: 0 20px;
        }
        button, .btn {
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
        button:hover, .btn:hover {
            background-color: #666;
        }
        #signature-preview {
            border-top:1px solid #222;
            margin:0;
            padding: 20px 0;
            width: 100%;
            max-width: 100%;
        }
        .instructions {
            margin-top: 20px;
            padding: 15px;
            background-color: #f0f8ff;
            border-radius: 5px;
            border: 4px solid #4682b4;
        }
        .copy-btn {
            display: block;
            margin: 20px auto;
            background-color: #4682b4;
            padding: 12px 25px;
            font-size: 16px;
        }
        #copy-section {
            padding: 0 20px;
        }
        .hidden {
            display: none;
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
</head>
<body>
    <div class="container">
            <h1 style="padding: 20px 20px 0 20px; margin-top: 0;">AEYIA Email Signature Generator</h1>

            <form method="get" class="team-buttons">
                @foreach ($team_members as $index => $member)
                    @php
                        $firstName = explode(' ', $member['name'])[0];
                    @endphp
                    <button type="submit" name="member_id" value="{{ $index }}" class="btn">{{ $firstName }}</button>
                @endforeach
            </form>

        @if ($selectedMember)
            <div id="copy-section">
                <div class="success-message">
                    Signature generated for {{ $selectedMember['name'] }}
                </div>
                <button id="copy-btn" class="copy-btn" onclick="copyToClipboard()">Copy Signature to Clipboard</button>
            </div>

            <div id="signature-preview" style="margin-top: 20px; margin-bottom: 20px;">
                {!! $signatureHtml !!}
            </div>

            <div id="alternative-options" class="hidden" style="padding: 0 20px;">
                <div class="instructions">
                    <h3>Alternative Options:</h3>
                    <p>If the copy button didn't work, you can try these options:</p>
                    <ol>
                        <li>
                            <button onclick="downloadSignature()" class="btn" style="background-color: #4682b4;">Download as HTML</button>
                            <span style="margin-left: 10px;">Download the signature as an HTML file and open in a browser</span>
                        </li>
                        <li style="margin-top: 10px;">
                            Manually select all content in the signature preview box above, copy with Ctrl+C (or Cmd+C on Mac)
                        </li>
                    </ol>
                </div>
            </div>

            <div class="instructions" id="instructions" style="margin: 20px;">
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
        @endif
    </div>

    <script>
        // Function to create a downloadable HTML file
        function downloadSignature() {
            const htmlContent = document.getElementById('signature-preview').innerHTML;
            const blob = new Blob(['<html><head><title>AEYIA Email Signature</title></head><body>', htmlContent, '</body></html>'], {type: 'text/html'});
            const a = document.createElement('a');
            a.href = URL.createObjectURL(blob);
            a.download = 'aeyia-signature.html';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }

        // Try regular copy first, then offer download option if it fails
        function copyToClipboard() {
            try {
                const el = document.getElementById('signature-preview');
                const range = document.createRange();
                range.selectNodeContents(el);
                const sel = window.getSelection();
                sel.removeAllRanges();
                sel.addRange(range);

                const success = document.execCommand('copy');
                sel.removeAllRanges();

                // Visual feedback
                const copyBtn = document.getElementById('copy-btn');
                if (success) {
                    copyBtn.textContent = 'Copied!';
                    setTimeout(() => {
                        copyBtn.textContent = 'Copy Signature to Clipboard';
                    }, 2000);
                } else {
                    // Show download and manual options
                    document.getElementById('alternative-options').classList.remove('hidden');
                }
            } catch (err) {
                console.error('Copy failed:', err);
                document.getElementById('alternative-options').classList.remove('hidden');
            }
        }
    </script>
</body>
</html>
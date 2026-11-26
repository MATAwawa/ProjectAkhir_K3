<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login - SIKAP Sawit</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    html, body {
      height: 100%;
      width: 100%;
      font-family: 'Plus Jakarta Sans', sans-serif;
      overflow-x: hidden;
    }

    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      background: linear-gradient(180deg, #bae6fd 0%, #e0f2fe 48%, #dcfce7 100%);
      padding: 20px;
    }

    /* BACKGROUND FULLSCREEN: Adegan Kebun Sawit, Pekerja & Pengawas */
    .fullscreen-bg-scene {
      position: fixed;
      inset: 0;
      width: 100vw;
      height: 100vh;
      z-index: 0;
      pointer-events: none;
      overflow: hidden;
    }

    .fullscreen-bg-scene svg {
      width: 100%;
      height: 100%;
      display: block;
    }

    /* Animasi SVG */
    @keyframes sunSpin {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }
    .sun-rays {
      transform-origin: 1280px 100px;
      animation: sunSpin 26s linear infinite;
    }

    @keyframes cloudDrift {
      0%, 100% { transform: translateX(-35px); }
      50% { transform: translateX(45px); }
    }
    .cloud-1 { animation: cloudDrift 16s ease-in-out infinite; }
    .cloud-2 { animation: cloudDrift 22s ease-in-out infinite reverse; }
    .cloud-3 { animation: cloudDrift 19s ease-in-out infinite 2s; }

    @keyframes palmSway {
      0%, 100% { transform: rotate(-2deg); }
      50% { transform: rotate(2.6deg); }
    }
    .sawit-crown-left {
      transform-origin: 210px 350px;
      animation: palmSway 4.2s ease-in-out infinite;
    }
    .sawit-crown-right {
      transform-origin: 1230px 365px;
      animation: palmSway 4.8s ease-in-out infinite reverse;
    }
    .sawit-crown-far-left {
      transform-origin: 70px 440px;
      animation: palmSway 5.2s ease-in-out infinite reverse;
    }

    @keyframes harvestMotion {
      0%, 100% { transform: rotate(-3.5deg); }
      50% { transform: rotate(4.5deg); }
    }
    .worker-arm-pole {
      transform-origin: 335px 545px;
      animation: harvestMotion 2.3s ease-in-out infinite;
    }

    @keyframes workerBodyBob {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-4px); }
    }
    .worker-body {
      animation: workerBodyBob 2.3s ease-in-out infinite;
    }

    @keyframes supervisorNod {
      0%, 100% { transform: rotate(0deg); }
      40% { transform: rotate(5deg); }
      70% { transform: rotate(-2deg); }
    }
    .supervisor-head {
      transform-origin: 1085px 518px;
      animation: supervisorNod 3.2s ease-in-out infinite;
    }

    @keyframes checkPulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.14); }
    }
    .check-badge {
      transform-origin: 1050px 482px;
      animation: checkPulse 2.2s ease-in-out infinite;
    }

    /* KARTU LOGIN GLASSMORPHISM DI TENGAH */
    .login-card-glass {
      position: relative;
      z-index: 10;
      width: 100%;
      max-width: 450px;
      background: rgba(255, 255, 255, 0.88);
      backdrop-filter: blur(18px);
      -webkit-backdrop-filter: blur(18px);
      border-radius: 28px;
      padding: 42px 38px;
      box-shadow: 0 25px 60px rgba(6, 78, 59, 0.2),
                  0 0 0 1.5px rgba(255, 255, 255, 0.9);
      animation: cardFadeUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    @keyframes cardFadeUp {
      from {
        opacity: 0;
        transform: translateY(25px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .brand-header-center {
      text-align: center;
      margin-bottom: 28px;
    }

    .k3-badge-top {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      background: #064e3b;
      color: #ffffff;
      padding: 6px 15px;
      border-radius: 50px;
      font-size: 0.72rem;
      font-weight: 700;
      letter-spacing: 0.7px;
      margin-bottom: 14px;
      box-shadow: 0 6px 14px rgba(6, 78, 59, 0.2);
    }

    .form-heading {
      font-size: 1.9rem;
      font-weight: 800;
      color: #064e3b;
      margin-bottom: 6px;
      letter-spacing: -0.4px;
    }

    .form-sub {
      font-size: 0.88rem;
      color: #475569;
      line-height: 1.6;
      margin: 0 auto;
    }

    .label-text {
      font-size: 0.83rem;
      font-weight: 700;
      color: #1e293b;
      margin-bottom: 8px;
      display: block;
      text-align: center;
    }

    .input-group-modern {
      position: relative;
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .input-group-modern i.left-icon {
      position: absolute;
      left: 18px;
      color: #64748b;
      font-size: 15px;
      z-index: 3;
      transition: color 0.2s;
    }

    .input-field {
      width: 100%;
      height: 52px;
      padding: 12px 46px;
      border-radius: 14px;
      border: 1.8px solid #cbd5e1;
      background: rgba(255, 255, 255, 0.95);
      font-size: 0.94rem;
      font-weight: 500;
      color: #0f172a;
      text-align: center;
      transition: all 0.2s ease;
    }

    .input-field:focus {
      outline: none;
      background: #ffffff;
      border-color: #16a34a;
      box-shadow: 0 0 0 4px rgba(22, 163, 74, 0.16);
    }

    .input-group-modern:focus-within i.left-icon {
      color: #16a34a;
    }

    .toggle-pwd {
      position: absolute;
      right: 16px;
      background: none;
      border: none;
      color: #64748b;
      cursor: pointer;
      font-size: 15px;
    }

    .toggle-pwd:hover {
      color: #0f172a;
    }

    .btn-sawit-login {
      width: 100%;
      height: 52px;
      border-radius: 14px;
      border: none;
      background: linear-gradient(135deg, #15803d 0%, #16a34a 100%);
      color: #ffffff;
      font-weight: 700;
      font-size: 0.96rem;
      letter-spacing: 0.5px;
      box-shadow: 0 12px 26px rgba(21, 128, 61, 0.3);
      transition: all 0.25s ease;
    }

    .btn-sawit-login:hover {
      background: linear-gradient(135deg, #166534 0%, #15803d 100%);
      transform: translateY(-2px);
      box-shadow: 0 16px 32px rgba(21, 128, 61, 0.4);
      color: #ffffff;
    }

    .custom-control-input:checked ~ .custom-control-label::before {
      background-color: #16a34a;
      border-color: #16a34a;
    }

    .alert-box {
      background: #fef2f2;
      border: 1px solid #fecaca;
      color: #dc2626;
      border-radius: 12px;
      padding: 11px 15px;
      font-size: 0.84rem;
      font-weight: 600;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 9px;
      margin-bottom: 20px;
      text-align: center;
    }

    .register-note {
      text-align: center;
      margin-top: 24px;
      padding-top: 18px;
      border-top: 1px solid rgba(203, 213, 225, 0.6);
      font-size: 0.88rem;
      color: #475569;
    }

    .register-note a {
      color: #15803d;
      font-weight: 700;
      text-decoration: none;
    }

    .register-note a:hover {
      text-decoration: underline;
    }

    @media (max-width: 576px) {
      .login-card-glass {
        padding: 32px 24px;
      }
    }
  </style>
</head>
<body>

  <!-- BACKGROUND ANIMASI FULLSCREEN -->
  <div class="fullscreen-bg-scene">
    <svg viewBox="0 0 1440 760" preserveAspectRatio="xMidYMax slice" xmlns="http://www.w3.org/2000/svg">
      <!-- Matahari & Sinar Berputar di Kanan Atas -->
      <g class="sun-rays">
        <circle cx="1280" cy="100" r="56" fill="#fde047" opacity="0.35"/>
        <line x1="1280" y1="25" x2="1280" y2="42" stroke="#facc15" stroke-width="4" stroke-linecap="round"/>
        <line x1="1280" y1="158" x2="1280" y2="175" stroke="#facc15" stroke-width="4" stroke-linecap="round"/>
        <line x1="1205" y1="100" x2="1222" y2="100" stroke="#facc15" stroke-width="4" stroke-linecap="round"/>
        <line x1="1338" y1="100" x2="1355" y2="100" stroke="#facc15" stroke-width="4" stroke-linecap="round"/>
        <line x1="1227" y1="47" x2="1239" y2="59" stroke="#facc15" stroke-width="4" stroke-linecap="round"/>
        <line x1="1321" y1="141" x2="1333" y2="153" stroke="#facc15" stroke-width="4" stroke-linecap="round"/>
        <line x1="1333" y1="47" x2="1321" y2="59" stroke="#facc15" stroke-width="4" stroke-linecap="round"/>
        <line x1="1239" y1="141" x2="1227" y2="153" stroke="#facc15" stroke-width="4" stroke-linecap="round"/>
      </g>
      <circle cx="1280" cy="100" r="36" fill="#facc15"/>

      <!-- Awan-awan Bergerak -->
      <g class="cloud-1" opacity="0.88">
        <path d="M160 110 Q176 82 206 88 Q228 68 254 88 Q280 88 284 112 Q284 132 260 132 L166 132 Q146 132 146 116 Q146 105 160 110 Z" fill="#ffffff"/>
      </g>
      <g class="cloud-2" opacity="0.78">
        <path d="M920 90 Q934 68 958 73 Q976 56 998 73 Q1018 73 1022 92 Q1022 108 1002 108 L926 108 Q910 108 910 95 Q910 86 920 90 Z" fill="#ffffff"/>
      </g>
      <g class="cloud-3" opacity="0.65">
        <path d="M540 75 Q550 58 568 62 Q582 49 598 62 Q614 62 616 76 Q616 88 602 88 L544 88 Q532 88 532 78 Q532 72 540 75 Z" fill="#ffffff"/>
      </g>

      <!-- Perbukitan & Lahan Perkebunan Luas -->
      <path d="M0 610 Q320 535 680 595 Q1060 540 1440 585 L1440 760 L0 760 Z" fill="#86efac"/>
      <path d="M0 645 Q420 595 860 640 Q1180 615 1440 640 L1440 760 L0 760 Z" fill="#22c55e"/>
      <rect x="0" y="685" width="1440" height="75" fill="#15803d"/>

      <!-- POHON KELAPA SAWIT JAUH DI KIRI (Latar) -->
      <g opacity="0.75">
        <path d="M56 675 L61 440 L79 440 L84 675 Z" fill="#6b3419"/>
        <g class="sawit-crown-far-left">
          <path d="M70 440 Q20 425 -20 460 Q25 445 70 443 Z" fill="#15803d"/>
          <path d="M70 440 Q120 425 160 460 Q115 445 70 443 Z" fill="#15803d"/>
          <path d="M70 440 Q28 388 -5 398 Q32 410 70 440 Z" fill="#16a34a"/>
          <path d="M70 440 Q112 388 145 398 Q108 410 70 440 Z" fill="#16a34a"/>
          <path d="M70 440 Q52 372 38 362 Q58 392 70 440 Z" fill="#22c55e"/>
          <path d="M70 440 Q88 372 102 362 Q82 392 70 440 Z" fill="#22c55e"/>
        </g>
      </g>

      <!-- POHON KELAPA SAWIT UTAMA DI KIRI -->
      <g>
        <!-- Batang Kelapa Sawit Tebal Bersisik -->
        <path d="M184 685 L193 350 L227 350 L236 685 Z" fill="#5c2d16"/>
        <path d="M190 650 L210 636 L230 650 M191 615 L210 601 L229 615 M191 580 L210 566 L229 580 M192 545 L210 531 L228 545 M192 510 L210 496 L228 510 M193 475 L210 461 L227 475 M193 440 L210 426 L227 440 M194 405 L210 391 L226 405 M194 375 L210 361 L226 375" fill="none" stroke="#3b1808" stroke-width="4.5" stroke-linecap="round"/>

        <!-- Tajuk Pelepah Sawit Rimbun Berlapis -->
        <g class="sawit-crown-left">
          <path d="M210 350 Q120 330 40 390 Q125 362 210 356 Z" fill="#14532d"/>
          <path d="M210 350 Q300 330 380 390 Q295 362 210 356 Z" fill="#14532d"/>
          <path d="M210 350 Q130 362 60 430 Q135 388 210 360 Z" fill="#166534"/>
          <path d="M210 350 Q290 362 360 430 Q285 388 210 360 Z" fill="#166534"/>

          <path d="M210 350 Q115 288 30 330 Q120 318 210 353 Z" fill="#15803d"/>
          <path d="M210 350 Q305 288 390 330 Q300 318 210 353 Z" fill="#15803d"/>
          <path d="M210 350 Q132 258 60 280 Q138 288 210 350 Z" fill="#16a34a"/>
          <path d="M210 350 Q288 258 360 280 Q282 288 210 350 Z" fill="#16a34a"/>

          <path d="M210 350 Q160 240 105 225 Q165 272 210 350 Z" fill="#22c55e"/>
          <path d="M210 350 Q260 240 315 225 Q255 272 210 350 Z" fill="#22c55e"/>
          <path d="M210 350 Q190 230 165 198 Q196 260 210 350 Z" fill="#4ade80"/>
          <path d="M210 350 Q230 230 255 198 Q224 260 210 350 Z" fill="#4ade80"/>
          <path d="M210 350 Q207 225 210 185 Q216 255 210 350 Z" fill="#16a34a"/>
        </g>

        <!-- Tandan Buah Sawit (TBS) Besar -->
        <g>
          <ellipse cx="190" cy="364" rx="15" ry="20" fill="#c2410c"/>
          <circle cx="185" cy="358" r="4" fill="#ea580c"/>
          <circle cx="194" cy="361" r="4" fill="#f97316"/>
          <circle cx="187" cy="370" r="4" fill="#facc15"/>
          <circle cx="196" cy="372" r="3.8" fill="#ea580c"/>

          <ellipse cx="230" cy="364" rx="15" ry="20" fill="#9a3412"/>
          <circle cx="226" cy="358" r="4" fill="#ea580c"/>
          <circle cx="235" cy="362" r="4" fill="#f97316"/>
          <circle cx="228" cy="371" r="4" fill="#facc15"/>
        </g>
      </g>

      <!-- PEKERJA PANEN DI SISI KIRI (Berhelm Kuning K3 + Tongkat Egrek Bergerak) -->
      <g class="worker-body">
        <rect x="315" y="592" width="12" height="44" rx="4" fill="#1e3a8a"/>
        <rect x="336" y="592" width="12" height="44" rx="4" fill="#1e3a8a"/>
        <path d="M310 632 L330 632 L330 646 L307 646 Z" fill="#1e293b"/>
        <path d="M334 632 L354 632 L354 646 L332 646 Z" fill="#1e293b"/>

        <rect x="310" y="532" width="44" height="62" rx="12" fill="#0284c7"/>
        <rect x="315" y="532" width="8" height="60" fill="#facc15"/>
        <rect x="341" y="532" width="8" height="60" fill="#facc15"/>

        <circle cx="332" cy="510" r="16" fill="#fed7aa"/>
        <path d="M312 507 Q314 486 332 486 Q350 486 352 507 Z" fill="#facc15"/>
        <rect x="309" y="505" width="46" height="5.5" rx="2.5" fill="#eab308"/>

        <g class="worker-arm-pole">
          <line x1="332" y1="546" x2="305" y2="558" stroke="#0284c7" stroke-width="9" stroke-linecap="round"/>
          <line x1="316" y1="585" x2="232" y2="378" stroke="#475569" stroke-width="5" stroke-linecap="round"/>
          <path d="M232 378 Q216 365 222 352" fill="none" stroke="#94a3b8" stroke-width="5" stroke-linecap="round"/>
        </g>
      </g>

      <!-- POHON KELAPA SAWIT UTAMA DI KANAN -->
      <g>
        <path d="M1208 685 L1216 365 L1244 365 L1252 685 Z" fill="#5c2d16"/>
        <path d="M1213 650 L1230 637 L1247 650 M1214 615 L1230 602 L1246 615 M1214 580 L1230 567 L1246 580 M1215 545 L1230 532 L1245 545 M1215 510 L1230 497 L1245 510 M1216 475 L1230 462 L1244 475 M1216 440 L1230 427 L1244 440 M1217 405 L1230 392 L1243 405" fill="none" stroke="#3b1808" stroke-width="4" stroke-linecap="round"/>

        <g class="sawit-crown-right">
          <path d="M1230 365 Q1145 345 1070 402 Q1150 376 1230 370 Z" fill="#14532d"/>
          <path d="M1230 365 Q1315 345 1390 402 Q1310 376 1230 370 Z" fill="#14532d"/>
          <path d="M1230 365 Q1155 375 1090 440 Q1160 400 1230 374 Z" fill="#166534"/>
          <path d="M1230 365 Q1305 375 1370 440 Q1300 400 1230 374 Z" fill="#166534"/>

          <path d="M1230 365 Q1140 305 1060 345 Q1145 335 1230 368 Z" fill="#15803d"/>
          <path d="M1230 365 Q1320 305 1400 345 Q1315 335 1230 368 Z" fill="#15803d"/>
          <path d="M1230 365 Q1156 275 1090 295 Q1162 305 1230 365 Z" fill="#16a34a"/>
          <path d="M1230 365 Q1304 275 1370 295 Q1298 305 1230 365 Z" fill="#16a34a"/>

          <path d="M1230 365 Q1185 260 1135 245 Q1190 290 1230 365 Z" fill="#22c55e"/>
          <path d="M1230 365 Q1275 260 1325 245 Q1270 290 1230 365 Z" fill="#22c55e"/>
          <path d="M1230 365 Q1212 248 1190 218 Q1218 278 1230 365 Z" fill="#4ade80"/>
          <path d="M1230 365 Q1248 248 1270 218 Q1242 278 1230 365 Z" fill="#4ade80"/>
          <path d="M1230 365 Q1227 245 1230 205 Q1236 272 1230 365 Z" fill="#16a34a"/>
        </g>

        <ellipse cx="1212" cy="378" rx="13" ry="17" fill="#c2410c"/>
        <circle cx="1208" cy="373" r="3.5" fill="#f97316"/>
        <circle cx="1216" cy="378" r="3.5" fill="#facc15"/>
        <ellipse cx="1248" cy="378" rx="13" ry="17" fill="#ea580c"/>
        <circle cx="1245" cy="374" r="3.5" fill="#facc15"/>
      </g>

      <!-- PENGAWAS K3 DI SISI KANAN (Berhelm Putih, Rompi Hijau, Pegang Clipboard) -->
      <g>
        <rect x="1068" y="592" width="12" height="44" rx="4" fill="#334155"/>
        <rect x="1089" y="592" width="12" height="44" rx="4" fill="#334155"/>
        <path d="M1063 632 L1083 632 L1083 646 L1060 646 Z" fill="#0f172a"/>
        <path d="M1087 632 L1107 632 L1107 646 L1085 646 Z" fill="#0f172a"/>

        <rect x="1063" y="532" width="44" height="62" rx="12" fill="#ffffff"/>
        <path d="M1063 535 L1078 535 L1078 592 L1063 592 Z" fill="#22c55e"/>
        <path d="M1092 535 L1107 535 L1107 592 L1092 592 Z" fill="#22c55e"/>
        <rect x="1063" y="560" width="44" height="6.5" fill="#fde047"/>

        <!-- Lengan Pegang Clipboard -->
        <line x1="1068" y1="546" x2="1044" y2="564" stroke="#ffffff" stroke-width="9" stroke-linecap="round"/>
        <rect x="1025" y="546" width="22" height="28" rx="3" fill="#92400e"/>
        <rect x="1028" y="549" width="16" height="22" rx="1.5" fill="#ffffff"/>
        <line x1="1031" y1="555" x2="1041" y2="555" stroke="#16a34a" stroke-width="2.2"/>
        <line x1="1031" y1="561" x2="1041" y2="561" stroke="#16a34a" stroke-width="2.2"/>
        <line x1="1031" y1="567" x2="1038" y2="567" stroke="#16a34a" stroke-width="2.2"/>

        <!-- Kepala Pengawas & Helm Putih -->
        <g class="supervisor-head">
          <circle cx="1085" cy="510" r="16" fill="#fed7aa"/>
          <path d="M1065 507 Q1067 486 1085 486 Q1103 486 1105 507 Z" fill="#ffffff" stroke="#cbd5e1" stroke-width="1.5"/>
          <rect x="1061" y="505" width="48" height="5.5" rx="2.5" fill="#e2e8f0"/>
        </g>

        <!-- Badge Centang K3 -->
        <g class="check-badge">
          <circle cx="1048" cy="476" r="20" fill="#16a34a"/>
          <path d="M1039 476 L1045 482 L1058 469" fill="none" stroke="#ffffff" stroke-width="3.8" stroke-linecap="round" stroke-linejoin="round"/>
        </g>
      </g>
    </svg>
  </div>

  <!-- FORM LOGIN MELAYANG DI TENGAH -->
  <div class="login-card-glass">
    <div class="brand-header-center">
      <div class="k3-badge-top">
        <i class="fas fa-hard-hat text-warning"></i>
        <span>SISTEM INFORMASI K3 PERKEBUNAN</span>
      </div>
      <h1 class="form-heading">SIKAP SAWIT</h1>
      <p class="form-sub">Silakan masuk untuk memantau keselamatan kerja & blok afdeling</p>
    </div>

    @if($errors->any())
      <div class="alert-box">
        <i class="fas fa-circle-exclamation"></i>
        <span>{{ $errors->first() }}</span>
      </div>
    @endif

    <form action="{{ route('login.post') }}" method="POST" autocomplete="off">
      @csrf

      <label class="label-text">Alamat Email</label>
      <div class="input-group-modern">
        <i class="fas fa-envelope left-icon"></i>
        <input type="email" name="email" class="input-field" placeholder="admin@sikapsawit.com" value="{{ old('email', $rememberedEmail ?? '') }}" autocomplete="off" required autofocus>
      </div>

      <label class="label-text">Kata Sandi</label>
      <div class="input-group-modern mb-3">
        <i class="fas fa-lock left-icon"></i>
        <input type="password" id="passwordInput" name="password" class="input-field" placeholder="Masukkan kata sandi" autocomplete="new-password" required>
        <button type="button" class="toggle-pwd" onclick="togglePassword()" title="Lihat/Sembunyikan">
          <i class="fas fa-eye" id="eyeIcon"></i>
        </button>
      </div>

      <div class="d-flex justify-content-center align-items-center mb-4">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ !empty($rememberedEmail) ? 'checked' : '' }}>
          <label class="custom-control-label small text-muted" for="remember" style="cursor:pointer;">Ingat saya (Cookie)</label>
        </div>
      </div>

      <button type="submit" class="btn btn-sawit-login">
        MASUK KE SISTEM <i class="fas fa-arrow-right ml-2"></i>
      </button>
    </form>

    <div class="register-note">
      Belum punya akun? <a href="{{ route('register') }}">Register di sini</a>
    </div>
  </div>

  <script>
    function togglePassword() {
      const input = document.getElementById('passwordInput');
      const icon = document.getElementById('eyeIcon');
      if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    }
  </script>
</body>
</html>

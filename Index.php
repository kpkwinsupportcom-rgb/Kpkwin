<!DOCTYPE html>
<html lang="ur">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KPK-WIN | Full Fixed
    </title>
    <style>
        body { margin: 0; font-family: sans-serif; background: #0a0a0a; color: white; padding-bottom: 80px; }
        header { 
    display: flex; 
    justify-content: space-between; 
    align-items: center; 
    padding: 8px 12px; 
    background: #111; 
    border-bottom: 2px solid #ff9900; 
    position: sticky; 
    top: 0; 
    z-index: 1000; 
}

.user-info { display: flex; flex-direction: column; }
#displayUser { color: #ff9900; font-weight: bold; font-size: 12px; }
.logo-small { font-size: 10px; color: #888; text-transform: uppercase; }

.top-actions { display: flex; align-items: center; gap: 6px; }
.balance-box { 
    background: #222; 
    padding: 4px 8px; 
    border-radius: 5px; 
    border: 1px solid #ff9900; 
    font-weight: bold; 
    font-size: 13px; 
    color: #ff9900; 
}
.top-btn { 
    padding: 5px 8px; 
    font-size: 10px; 
    font-weight: bold; 
    border-radius: 4px; 
    border: none; 
}
.btn-dep { background: #ff9900; color: #000; }
.btn-wit { background: #333; color: #fff; border: 1px solid #444; }

        .logo { font-size: 20px; font-weight: bold; color: #ff9900; cursor: pointer; }
        .page { display: none; padding: 15px; min-height: 100vh; box-sizing: border-box; }
        .active-page { display: block; }
        .card { background: #151515; padding: 20px; border-radius: 15px; border-left: 5px solid #ff9900; margin-bottom: 20px; text-align: center; }
        .btn-gold { width: 100%; padding: 14px; background: #ff9900; border: none; border-radius: 10px; font-weight: bold; color: black; cursor: pointer; margin: 5px 0; font-size: 15px; transition: 0.3s; }
        .btn-outline { background: transparent; border: 1px solid #ff9900; color: #ff9900; margin-bottom: 10px; }
        .btn-dark { background: #222; color: #ff9900; border: 1px solid #333; }
        input, select { width: 100%; padding: 12px; margin: 8px 0; border-radius: 8px; border: 1px solid #333; background: #1a1a1a; color: white; box-sizing: border-box; }
        .bottom-nav { position: fixed; bottom: 0; width: 100%; background: #000; display: flex; justify-content: space-around; padding: 12px 0; border-top: 2px solid #222; z-index: 1000; }
        .nav-item { text-align: center; font-size: 11px; color: #888; cursor: pointer; }
        #adminPanel { background: #000; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 2000; display: none; padding: 15px; overflow-y: auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 11px; }
        th { background: #ff9900; color: black; padding: 8px; border: 1px solid #333; }
        td { padding: 8px; border: 1px solid #222; text-align: center; background: #111; }
        .edit-box { display: none; background: #111; padding: 10px; border-radius: 10px; margin-top: 5px; border: 1px dashed #444; }
    </style>
</head>
<body>
<div id="loginPage" class="page active-page">
    <h1 style="color:#ff9900; text-align:center; margin-top:80px;">KPK-WIN</h1>
    <h3 style="text-align:center; color:#fff; direction: rtl;">اکاؤنٹ میں لاگ ان کریں</h3>
    
    <div style="direction: rtl;">
        <input type="text" id="logUser" placeholder="صارف کا نام (Username)">
        <input type="password" id="logPass" placeholder="پاس ورڈ (Password)">
    </div>
    
    <button class="btn-gold" onclick="login()">لاگ ان کریں</button>
    
    <p style="text-align:center; color:#888; cursor:pointer; direction: rtl;" onclick="changePage('signupPage')">
        نیا اکاؤنٹ بنائیں (Signup)
    </p>
</div>

<div id="signupPage" class="page">
    <h1 style="color:#ff9900; text-align:center; margin-top:80px;">KPK-WIN</h1>
    <h3 style="text-align:center; color:#fff; direction: rtl;">نیا اکاؤنٹ رجسٹر کریں</h3>
    
    <div style="direction: rtl;">
        <input type="text" id="regUser" placeholder="صارف کا نام (Username)">
        <input type="number" id="regPhone" placeholder="موبائل نمبر (Mobile Number)">
        <input type="password" id="regPass" placeholder="پاس ورڈ (Password)">
        <input type="text" id="regRefer" placeholder="انویٹیشن کوڈ (Optional)" style="border: 1px solid #ff9900;">
    </div>
    
    <button class="btn-gold" onclick="registerUser()">رجسٹر کریں</button>
    
    <button class="btn-gold btn-outline" onclick="changePage('loginPage')" style="direction: rtl;">
        لاگ ان پر واپس جائیں
    </button>
</div>

<div id="homePage" class="page">
   <header>
    <div class="user-info">
       <div class="logo-small" onclick="checkAdminAccess()" 
     style="font-size: 24px; font-weight: 900; color: #ff9900; letter-spacing: 1px; text-shadow: 0 0 10px rgba(255,153,0,0.5); line-height: 1.2;">
     KPK-WIN
    </div>
        <div id="displayUser">خوش آمدید، User</div>
    </div>
    
    <div class="top-actions">
        <div class="balance-box">Rs <span id="userBal">0</span></div>
        <button class="top-btn btn-dep" onclick="changePage('depositPage')">DEP</button>
        <button class="top-btn btn-wit" onclick="changePage('withdrawPage')">WIT</button>
  </div>
</header>

<div id="bannerSlider" style="width: 100%; height: 180px; overflow: hidden; border-radius: 15px; position: relative; margin-top: 15px; margin-bottom: 20px; background: #1a1a1a;">
    
    <div class="mySlides" style="display: block; width: 100%; height: 100%; background: linear-gradient(45deg, #ff9900, #ffcc00); text-align: center; color: black; padding: 15px; box-sizing: border-box;">
        <h2 style="margin: 0; font-size: 18px; direction: rtl; font-weight: 800;">کے پی کے ون میں خوش آمدید</h2>
        <p style="font-size: 16px; direction: rtl; font-weight: 700; margin-top: 12px; line-height: 1.4;">
            نئے ممبرز کے لیے پہلے ڈپازٹ پر 50% رقم بالکل مفت بونس!
        </p>
    </div>

    <div class="mySlides" style="display: none; width: 100%; height: 100%; background: linear-gradient(135deg, #0f2027, #2c5364); text-align: center; color: white; padding: 15px; box-sizing: border-box;">
        <h2 style="margin: 0; font-size: 20px; direction: rtl; font-weight: 800; color: #fff;">تیز ترین ودڈرال سروس</h2>
        <p style="font-size: 16px; direction: rtl; font-weight: 700; margin-top: 12px; line-height: 1.4;">
            آپ کا ودڈرال اب صرف چند منٹوں میں آپ کے اکاؤنٹ میں!
        </p>
    </div>

    <div class="mySlides" style="display: none; width: 100%; height: 100%; background: linear-gradient(45deg, #420360, #923cb5); text-align: center; color: white; padding: 10px; box-sizing: border-box;">
        <h2 style="margin: 0 0 5px 0; font-size: 16px; direction: rtl; font-weight: 800; color: #ffcc00;">دوستوں کو انوائٹ کریں اور بونس پائیں!</h2>
        <div style="direction: rtl; font-size: 14px; font-weight: 700; line-height: 1.4; background: rgba(0,0,0,0.4); padding: 8px; border-radius: 10px; display: inline-block; width: 90%;">
            <p style="margin: 2px 0;">🤝 1 انوائٹ پر پائیں: <span style="color: #ffcc00;">Rs.100</span></p>
            <p style="margin: 2px 0;">🤝 2 انوائٹ پر پائیں: <span style="color: #ffcc00;">Rs.200</span></p>
            <p style="margin: 2px 0;">🤝 3 انوائٹ پر پائیں: <span style="color: #ffcc00;">Rs.300</span></p>
        </div>
        <p style="font-size: 12px; margin-top: 5px; opacity: 0.9;">جتنے زیادہ دوست، اتنا زیادہ منافع!</p>
    </div>
</div>

<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex-1].style.display = "block";
        setTimeout(showSlides, 3500); 
    }
</script>

   <div style="display: flex; gap: 10px; padding: 10px; overflow-x: auto; background: #000; border-bottom: 2px solid #222; position: sticky; top: 55px; z-index: 999; scrollbar-width: none;">

   </div>

<div id="crashMenu" style="display:block; padding:15px; background: #121212; clear:both; border-radius: 15px;">
    <div id="gameListContainer" style="display: flex; flex-direction: column; gap: 10px;">
        <script>
            const gamesList = [
                { name: "Aviator", link: "game.php" },
                { name: "Crash Cricket", link: "cricket.html" },
                { name: "Fortune Ox", link: "fortune_ox.html" },
                { name: "Jili Slot", link: "jili.html" },
                { name: "Mines", link: "mines.html" },
                { name: "Crazy 777", link: "crazy777.html" },
                { name: "Money Coming", link: "money_coming.html" },
                { name: "Ali Baba", link: "alibaba.html" },
                { name: "Golden Empire", link: "golden_empire.html" },
                { name: "Fengshen", link: "fengshen.html" },
                { name: "Candy Baby", link: "candy_baby.html" },
                { name: "Fortune Gems", link: "fortune_gems.html" },
                { name: "Plinko", link: "plinko.html" },
                { name: "Goal", link: "goal.html" },
                { name: "XiyangYang", link: "xiyangyang.html" },
                { name: "Fortune Rabbit", link: "rabbit.html" },
                { name: "Wild Bounty", link: "wild_bounty.html" },
                { name: "Fire Strike 2", link: "fire_strike.html" },
                { name: "Fortune Tiger", link: "tiger.html" },
                { name: "Fortune Mouse", link: "mouse.html" },
                { name: "Boxing King", link: "boxing.html" },
                { name: "Mega Ace", link: "mega_ace.html" },
                { name: "Dragon Fire", link: "dragon_fire.html" },
                { name: "Cash Ultimate", link: "cash_ultimate.html" },
                { name: "Bombuster", link: "bombuster.html" },
                { name: "Aztec Spins", link: "aztec.html" },
                { name: "Magic Treasure", link: "magic_treasure.html" },
                { name: "100x Lions", link: "lions.html" },
                { name: "Piggy Bank", link: "piggy.html" },
                { name: "Fortress War", link: "fortress.html" },
                { name: "Laughing Maitreya", link: "maitreya.html" },
                { name: "Wild Portals", link: "wild_portals.html" },
                { name: "Over the Moon", link: "moon.html" },
                { name: "Fortune Twins", link: "twins.html" },
                { name: "Ore Power", link: "ore_power.html" },
                { name: "Triple Monkey", link: "monkey.html" },
                { name: "Jin Hou Ye", link: "jinhouye.html" },
                { name: "Greatest Circus", link: "circus.html" },
                { name: "Get Money", link: "get_money.html" },
                { name: "Reel Thunder", link: "thunder.html" },
                { name: "Thunderstruck", link: "thunderstruck.html" },
                { name: "What A Hoot", link: "hoot.html" },
                { name: "Poker Win", link: "poker.html" },
                { name: "Money Tree", link: "tree.html" },
                { name: "Animal Racing", link: "racing.html" },
                { name: "Magic Ace", link: "magic_ace.html" },
                { name: "Aviator Pro", link: "game.html" },
                { name: "Jili 100", link: "jili100.html" },
                { name: "Lucky Dragon", link: "lucky_dragon.html" },
                { name: "Crash Pro", link: "crash_pro.html" }
            ];

            gamesList.forEach(game => {
                let iconHtml = (game.name.includes("Aviator")) 
                    ? `<svg viewBox="0 0 512 512" style="width:30px; fill:#ff0000; filter: drop-shadow(0 0 5px #ff0000); transform: rotate(90deg);"><path d="M448 336v-40L288 192V72c0-39.8-32.2-72-72-72s-72 32.2-72 72v120L0 296v40l144-48v112l-48 36v32l72-24 72 24v-32l-48-36V288l152 48z"/></svg>`
                    : `<img src="https://img.icons8.com/fluency/48/controller.png" style="width: 30px; opacity: 0.8;">`;

                let cardHtml = `
                <div onclick="window.location.href='${game.link}'" style="width: 100%; display: flex; align-items: center; background: #1a1a1a; border-radius: 10px; border: 1px solid #333; padding: 12px; cursor: pointer; box-sizing: border-box; margin-bottom: 5px;">
                    <div style="width: 50px; height: 50px; background: #222; border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-right: 15px; flex-shrink: 0;">
                        ${iconHtml}
                    </div>
                    <div style="flex-grow: 1;">
                        <div style="color: #fff; font-weight: bold; font-size: 14px; text-transform: uppercase;">${game.name}</div>
                        <div style="color: #ff9800; font-size: 10px; font-weight: bold;">HOT GAME</div>
                    </div>
                    <div style="color: #555; font-size: 18px; margin-left: 10px;">&#10095;</div>
                </div>`;
                document.write(cardHtml);
            });
        </script>
    </div>
</div>

   <div id="gamesDisplay" style="display: none; grid-template-columns: repeat(2, 1fr); gap: 10px; padding: 15px;">
       </div>

   <div class="bottom-nav">
        <div class="nav-item" onclick="changePage('homePage')">🏠<br>Home</div>
        <div class="nav-item" onclick="openProfile()">👤<br>Profile</div>
        <div class="nav-item" onclick="location.reload()">🔄<br>Logout</div>
   </div>
</div> 
<div id="inviteHistoryPage" class="page" style="display:none; padding:15px; color:white; background:#111; min-height:100vh;">
    <button onclick="changePage('profilePage')" style="background:#ff9900; color:black; border:none; padding:8px 15px; border-radius:5px; font-weight:bold; margin-bottom:15px; width:100px; display:block;">← Back</button>
    <h2 style="text-align:center; color:#ff9900;">Referral Rewards</h2>
    <div id="inviteStats" style="background:#222; padding:15px; border-radius:10px; margin-bottom:15px; border:1px solid #ff9900;">
        <p style="margin:0;">Total Invites: <span id="totalInvitesCount" style="font-weight:bold; color:#ff9900;">0</span></p>
        <p id="nextRewardInfo" style="font-size:12px; color:#aaa; margin-top:5px;">Invite more friends to earn!</p>
    </div>
    <h3 style="border-bottom:1px solid #333; padding-bottom:5px;">Your Invites History</h3>
    <div id="inviteList" style="font-size:12px; margin-top:10px;"></div>
</div>

<div id="depositPage" class="page">
    <h3 style="color:#ff9900;">Deposit Funds</h3>
    <button class="btn-gold btn-outline" onclick="openHistory('Deposit')">Deposit History</button>
    <select id="depMethod" onchange="updateDepView(this.value)">
        <option value="">-- Select Bank --</option>
        <option value="jazz">JazzCash (03499510040)</option>
        <option value="Easypaisa">Easypaisa (03405032202)</option>
        <option value="sadapay">SadaPay (03405032202)</option>
        <option value="nayapay">NayaPay (03405032202)</option>
        <option value="hbl">HBL / First Bank (03405032202)</option>
        <option value="meezan">Meezan Bank (07040103238191)</option>
        <option value="zindgi">Zindgi Bank (03405032202)</option>
<option value="ubl" data-acc="0059311913134">UBL Bank</option>
    </select>
    <div id="depForm" style="display:none; background:#111; padding:15px; border-radius:10px; border:1px solid #ff9900;">
        <p id="depAccShow" style="color:#ff9900; font-weight:bold; text-align:center;"></p>
        <p style="color:#fff; text-align: center; font-size: 14px;">Name: Yasir Khan</p>
        <input type="number" id="depAmt" placeholder="Amount">
        <input type="text" id="depTID" placeholder="TID"
        >
        <div style="margin: 10px 0; border: 1px dashed #555; padding: 10px; border-radius: 8px; text-align: center; position: relative; background: #000;">
            <input type="file" id="depScreenshot" accept="image/*" 
                   style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; opacity: 0; cursor: pointer;"
                   onchange="document.getElementById('fileStat').innerText = '✅ Photo Selected'">
            <div id="fileStat" style="color: #888; font-size: 13px;">📸 Upload Receipt Screenshot</div>
        </div>
       <button class="btn-gold" onclick="submitDeposit()">Submit Deposit</button>

</div> <button class="btn-gold" style="background:#333; color:white; margin-top:10px;" onclick="changePage('homePage')">Back</button>

    <div style="background: rgba(255, 153, 0, 0.1); padding: 15px; border-radius: 12px; border: 1px solid #ff9900; margin-top: 20px; color: #ffffff; text-align: center; direction: rtl;">
        <b style="font-size: 18px; color: #ff9900; text-decoration: underline; display: block; margin-bottom: 10px;">⚠️ اہم نوٹ برائے ڈپازٹ</b>
        <p style="font-size: 14px; margin-bottom: 10px;">  <p>آپ کا <strong>ڈیپوزٹ</strong> 1 منٹ سے لے کر 24 گھنٹے کے دوران آپ کے گیم اکاؤنٹ میں منتقل کر دیا جائے گا۔ براہ کرم انتظار کریں۔ اگر 24 گھنٹے گزرنے کے باوجود رقم آپ کے اکاؤنٹ میں موصول نہ ہو، تو فوری طور پر ہیلپ لائن سے رابطہ کریں۔</p>
        
        <div style="background: rgba(255, 68, 68, 0.15); padding: 10px; border-radius: 8px; border: 1px dashed #ff4444; margin-bottom: 10px;">
            <span style="color: #ff4444; font-weight: bold; font-size: 13px;">کمپنی کے نمبر کے علاوہ کسی غلط اکاؤنٹ پر رقم بھیجنے کی صورت میں کمپنی ذمہ دار نہیں ہوگی۔</span>
        </div>
        
        <p style="font-weight: bold; color: #ff9900;">شکریہ!</p>
</div>
<div style="text-align: center; margin: 20px 0;">
   <button onclick="openWhatsApp()" style="background: #27d05f; color: white; border: none; width: 85%; padding: 15px; border-radius: 12px; font-size: 18px; font-weight: bold; cursor: pointer;">
      WhatsApp Helpline
   </button>
</div>

<script>
function openWhatsApp(){
    window.open("https://api.whatsapp.com/send?phone=923499510040", "_blank");
}
</script>

</div>

<div id="withdrawPage" class="page">
    <h3 style="color:#ff9900;">Withdraw Funds</h3>
   <button class="btn-gold btn-outline" onclick="openHistory('Withdraw')">Withdraw History</button>
    <select id="witBank">
        <option value="">-- Select Bank (30+) --</option>
        <option>Easypaisa</option><option>JazzCash</option><option>SadaPay</option><option>NayaPay</option>
        <option>HBL Bank</option><option>Meezan Bank</option><option>UBL Bank</option><option>Bank Alfalah</option>
        <option>Allied Bank</option><option>MCB Bank</option><option>Zindgi App</option><option>Askari Bank</option>
        <option>Bank Al-Habib</option><option>Faysal Bank</option><option>Habib Metropolitan</option><option>Bank of Punjab</option>
        <option>Standard Chartered</option><option>Dubai Islamic Bank</option><option>Al Baraka Bank</option><option>Summit Bank</option>
        <option>Silk Bank</option><option>Samba Bank</option><option>JS Bank</option><option>Soneri Bank</option>
        <option>Sindh Bank</option><option>Bank of Khyber</option><option>First Women Bank</option><option>Mobilink Microfinance</option>
        <option>Telenor Bank</option><option>FINCA Bank</option>
    </select>
    <input type="number" id="witAmt" placeholder="Amount">
    <input type="text" id="witName" placeholder="Account Name">
    <input type="text" id="witAccNo" placeholder="Account Number">
    <input type="password" id="confirmWitPass" placeholder="W-Password">
    <button class="btn-gold" onclick="submitWithdraw()">Request Withdrawal</button>
    <button class="btn-gold" style="background:#333; color:white;" onclick="changePage('homePage')">Back</button>
<div style="background: rgba(0, 0, 0, 0.8); padding: 15px; border-radius: 12px; border: 2px solid #ff9900; margin: 20px 0; color: #ffffff; text-align: center; direction: rtl; font-family: sans-serif;">
    <div style="margin-bottom: 10px;">
        <span style="font-size: 20px;">⚠️</span>
        <b style="font-size: 18px; color: #ff9900; text-decoration: underline;">اہم نوٹ برائے ودڈرال</b>
    </div>
    <p style="font-size: 14px; line-height: 1.8; margin-bottom: 15px;">
        آپ کا ودڈرال 1 منٹ سے لے کر 24 گھنٹے کے دوران آپ کے بینک اکاؤنٹ میں منتقل کر دیا جائے گا۔ براہ کرم انتظار کریں۔ اگر 24 گھنٹے گزرنے کے باوجود رقم آپ کے اکاؤنٹ میں موصول نہ ہو، تو فوری طور پر ہیلپ لائن سے رابطہ۔"
    </p>
    <div style="background: rgba(255, 68, 68, 0.15); padding: 10px; border-radius: 8px; border: 1px dashed #ff4444;">
        <span style="color: #ff4444; font-weight: bold; font-size: 14px;">
            "غلط اکاؤنٹ نمبر فراہم کرنے کی صورت میں کمپنی ذمہ دار نہیں ہوگی۔"
        </span>
    </div>
    <p style="margin-top: 10px; font-weight: bold; color: #ff9900;">شکریہ!</p>
</div>
<div style="text-align: center; margin: 20px 0;">
   <button onclick="openWhatsApp()" style="background: #27d05f; color: white; border: none; width: 85%; padding: 15px; border-radius: 12px; font-size: 18px; font-weight: bold; cursor: pointer;">
      WhatsApp Helpline
   </button>
</div>
<script>
function openWhatsApp() {
    // یہ طریقہ براؤزر کو مجبور کرتا ہے کہ وہ واٹس ایپ کھولے
    window.open("https://api.whatsapp.com/send?phone=923499510040", "_blank");
}
</script>

</div>

<div id="profilePage" class="page">
    <h3 style="color:#ff9900; text-align:center;">SETTINGS & PROFILE</h3>
    <div class="card" style="text-align:left;">
        <button class="btn-gold btn-dark" onclick="toggleEdit('userBox')">Change Username 👤</button>
        <div id="userBox" class="edit-box">
            <input type="text" id="editUsername" placeholder="New Username">
            <button class="btn-gold" onclick="updateUsername()">Save Name</button>
        </div>
        <button class="btn-gold btn-dark" onclick="toggleEdit('passBox')">Change Login Password 🔑</button>
        <div id="passBox" class="edit-box">
            <input type="password" id="newLoginPass" placeholder="New Password">
            <button class="btn-gold" onclick="updateLoginPass()">Save Password</button>
        </div>
        <button class="btn-gold btn-dark" onclick="toggleEdit('witPassBox')">Change Withdraw Password 💳</button>
        <div id="witPassBox" class="edit-box">
            <input type="password" id="newWPass" placeholder="New W-Password">
            <button class="btn-gold" onclick="changeWPass()">Save W-Pass</button>
        </div>
        <div class="card" style="margin-top: 15px; border-left: 5px solid #28a745;">
    <h4 style="color:#ff9900; margin:0;">Invite Friends 👥</h4>
    <p style="font-size:12px; color:#888;">Apna Username doston ko dein ya link copy karein:</p>
    <div id="referDisplay" style="background:#000; padding:10px; border-radius:5px; margin:10px 0; border:1px dashed #444; font-weight:bold; color:#ff9900;"></div>
    <button class="btn-gold btn-outline" onclick="copyMyLink()" style="font-size:12px; padding:8px;">Copy Invite Link</button>
</div>
 <button onclick="openInviteHistory()" style="width:100%; background:#ff9900; color:black; padding:10px; margin-top:10px; border-radius:5px; font-weight:bold; border:none;">
    Check Invite History
</button>
    </div>
    <h3 style="color:#ff9900; text-align:center;">HELPLINE</h3>
    <div class="card">
        <button class="btn-gold" style="background:#25D366; color:white;" onclick="window.open('https://wa.me/923405032202')">WhatsApp</button>
        <p style="color:#888; font-size:12px;">kpkwin.support.com.gmail.com</p>
        <button class="btn-gold btn-outline" onclick="copyEmail()">Copy Email</button>
    </div>
    <button class="btn-gold" style="background:#333; color:white;" onclick="changePage('homePage')">Back</button>
</div>

<div id="historyPage" class="page">
   <h3 id="histTitle" style="color:#ff9900; text-align:center;">History</h3>
    <div id="histList"></div>
    <button class="btn-gold" onclick="changePage('homePage')">Back</button>
</div>
</div>
<div id="adminPanel" style="display:none; padding:15px; background:#000; min-height:100vh;">
    <h2 style="color:#ff9900; text-align:center;">ADMIN PANEL</h2>
    <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:5px;">
        <button class="btn-gold" onclick="loadAdmin('Users')">Users</button>
        <button class="btn-gold" onclick="loadAdmin('Deps')">Deps</button>
        <button class="btn-gold" onclick="loadAdmin('Wits')">Wits</button>
    </div>
    
    <button class="btn-gold" style="background:linear-gradient(to right, #ff416c, #ff4b2b); color:white; margin:10px 0; border:none; width:100%;" 
        onclick="clearLogs()">🗑️ Clear All Logs</button>

    <div id="adminData" style="overflow-x:auto; margin-top:20px;"></div>

    <button class="btn-gold" style="background:red; color:white; margin-top:30px;" onclick="location.reload()">LOGOUT</button>
</div>

<script>
    let users = JSON.parse(localStorage.getItem('kpk_users')) || [{username: "Yasirsawab", password: "Pakistan@22y", balance: 5000, status: "active", witPass: "12345"}];
    let logs = JSON.parse(localStorage.getItem('kpk_logs')) || [];
    let loggedInUser = null;

    function save() { localStorage.setItem('kpk_users', JSON.stringify(users)); localStorage.setItem('kpk_logs', JSON.stringify(logs)); }
    function changePage(id) { document.querySelectorAll('.page').forEach(p => p.style.display = 'none'); document.getElementById(id).style.display = 'block'; }
    function updateUI() { 
    // .toFixed(2) se point ke baad sirf 2 numbers nazar ayenge
    document.getElementById('userBal').innerText = parseFloat(loggedInUser.balance).toFixed(2); 
    document.getElementById('displayUser').innerText = "خوش آمدید " + loggedInUser.username;
}

    function login() {
    let u = document.getElementById('logUser').value, p = document.getElementById('logPass').value;
    
    // Admin Access
    if(u === "Yasirsawab" && p === "Pakistan@22y") {
        loggedInUser = users.find(x => x.username === "Yasirsawab");
        document.getElementById('loginPage').style.display = 'none';
        document.getElementById('adminPanel').style.display = 'block';
        loadAdmin('Users'); 
        return;
    }

    // User Access
    let found = users.find(x => x.username === u && x.password === p);
    if(found) {
        if(found.status === 'blocked') return alert("Aapka account block hai!");
        
        loggedInUser = found;
        changePage('homePage');
        updateUI(); // Ye line balance ko screen par dikhayegi
        document.querySelector('.bottom-nav').style.display = 'flex';
    } else {
        alert("Ghalat Username ya Password!");
    }
}

    function registerUser() {
    let u = document.getElementById('regUser').value;
    let p = document.getElementById('regPass').value;
    let ph = document.getElementById('regPhone').value;
    // Invite code uthany ke liye ye line add ki hai
    let refBy = document.getElementById('regRefer').value || "Direct"; 

    if(u && p && ph) {
        // Pehle se majood user check karne ke liye
        if(users.find(user => user.username === u)) {
            alert("Ye Username pehle se majood hai!");
            return;
        }

        let newUser = {
            username: u,
            password: p,
            phone: ph,
            balance: 0,
            witPass: "1234",
            invitedBy: refBy, // Admin ko dikhane ke liye data save
            status: "active"
        };
        
        users.push(newUser);
        localStorage.setItem('kpk_users', JSON.stringify(users));
        alert("Account ban gaya hai! Invited by: " + refBy);
        changePage('loginPage');
    } else {
        alert("Meharbani karke tamam khali jaghen pur karein!");
    }
}

function updateDepView(val) {
    var form = document.getElementById('depForm');
    var accShow = document.getElementById('depAccShow');
    if (val !== "") {
        form.style.display = "block";
        if (val === "jazz") {
            accShow.innerText = "JazzCash: 03499510040";
        } else if (val === "sadapay") {
            accShow.innerText = "SadaPay: 03405032202";
        } else if (val === "meezan") {
            accShow.innerText = "Meezan Bank: 07040103238191";
} else {
    accShow.innerText = 
        "UBL Bank: 0059311913134";
}
    } else {
        form.style.display = "none";
    }
}

    function submitDeposit() { 
    let amt = document.getElementById('depAmt').value;
    let tid = document.getElementById('depTID').value;
    let fileInput = document.getElementById('depScreenshot');
    
    if(!amt || !tid || !fileInput.files[0]) return alert("رقم، TID اور اسکرین شاٹ لازمی ہے!");

    let reader = new FileReader();
    reader.onload = function(e) {
        let img = new Image();
        img.onload = function() {
            let canvas = document.createElement('canvas');
            let ctx = canvas.getContext('2d');
            let maxWidth = 400; 
            canvas.width = maxWidth;
            canvas.height = (img.height / img.width) * maxWidth;
            ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
            
            let compressedData = canvas.toDataURL('image/jpeg', 0.6); 

            logs.push({
                id: Date.now(), 
                user: loggedInUser.username, 
                type: 'Deposit', 
                amount: parseInt(amt), 
                tid: tid, 
                image: compressedData, 
                status: 'Pending', 
                date: new Date().toLocaleString()
            }); 
            
            save(); 
            alert("ڈپازٹ کی درخواست بھیج دی گئی!"); 
            changePage('homePage'); 
        };
        img.src = e.target.result;
    };
    reader.readAsDataURL(fileInput.files[0]); 
}

function submitWithdraw() { 
    let amt = parseInt(document.getElementById('witAmt').value);
    let bank = document.getElementById('witBank').value;
    let name = document.getElementById('witName').value;
    let acc = document.getElementById('witAccNo').value;
    let pass = document.getElementById('confirmWitPass').value;

    if(!amt || !bank || !name || !acc || !pass) return alert("Fields bharna lazmi hain!");
    if(amt > loggedInUser.balance) return alert("Balance kam hai!");
    if(pass !== loggedInUser.witPass) return alert("Ghalat W-Password!");

    loggedInUser.balance -= amt;
    logs.push({
        id: Date.now(), user: loggedInUser.username, type: 'Withdraw', amount: amt,
        bank: bank, accName: name, accNo: acc, status: 'Pending', date: new Date().toLocaleString()
    });
    save(); updateUI();
    alert("Withdraw request bhaij di gayi!");
    changePage('homePage');
}

function toggleEdit(id) {
    let el = document.getElementById(id);
    el.style.display = (el.style.display === 'block') ? 'none' : 'block';
}

function openProfile() { changePage('profilePage'); }

function openInviteHistory() {
    try {
        // 1. Pehle page change karein
        changePage('inviteHistoryPage');

        if (!loggedInUser) {
            console.log("User not logged in");
            return;
        }

        // 2. Stats update karein
        let totalCount = loggedInUser.referralCount || 0;
        let countDisp = document.getElementById('totalInvitesCount');
        if (countDisp) {
            countDisp.innerText = totalCount;
        }

        // 3. Next reward info
        let nextInfo = document.getElementById('nextRewardInfo');
        if (nextInfo) {
            if (totalCount < 1) nextInfo.innerText = "1st invite par Rs 100 milenge!";
            else nextInfo.innerText = "Invite more to earn rewards!";
        }

        // 4. Invite List (History)
        let listDiv = document.getElementById('inviteList');
        if (listDiv) {
            // "logs" variable ko filter karein
            let myInvites = logs.filter(l => l.user === loggedInUser.username && l.type === 'Referral Bonus');

            if (myInvites.length === 0) {
                listDiv.innerHTML = "<p style='text-align:center; color:#888; padding:20px;'>No invites found.</p>";
            } else {
                let html = "";
                myInvites.forEach((inv) => {
                    html += `
                    <div style="background:#222; padding:12px; border-radius:8px; margin-bottom:10px; border-left:4px solid #ff9900;">
                        <span style="color:white;">Invite Bonus</span>
                        <span style="float:right; color:#ff9900;">Rs ${inv.amount}</span>
                    </div>`;
                });
                listDiv.innerHTML = html;
            }
        }
    } catch (error) {
        // Agar koi error aye to alert dikhaye ga
        alert("JavaScript Error: " + error.message);
    }
}

function loadAdmin(type) {
    let dataDiv = document.getElementById('adminData');
    let html = "";

    if (type === 'Users') {
        html = `<h3>Users List</h3>
               <table border='1' style='width:100%; color:white; font-size:10px; border-collapse:collapse;'>
               <tr>
                   <th>User</th>
                   <th>Inviter</th>
                   <th>Pass</th>
                   <th>W-Pass</th>
                   <th>Bal</th>
                   <th>Status</th>
                   <th>Action</th>
                   <th>Remove</th> </tr>`;
        
        users.forEach((u, index) => {
            let inviterName = u.invitedBy ? u.invitedBy : "Direct";
            
            // Yasirsawab ko delete karne ka button nahi dikhega (safety ke liye)
            let deleteBtn = u.username === "Yasirsawab" ? "-" : 
                `<button onclick="deleteUser(${index})" style="background:#ff4444; color:white; border:none; padding:5px; border-radius:4px; font-weight:bold;">Del</button>`;

            html += `<tr>
                <td>${u.username}</td>
                <td style="color:#ff9900; font-weight:bold;">${inviterName}</td>
                <td>${u.password}</td>
                <td>${u.witPass || '1234'}</td>
                <td>${u.balance}</td>
                <td>${u.status}</td>
                <td>
                    <button onclick="toggleBlock(${index})">${u.status === 'blocked' ? 'Unblock' : 'Block'}</button>
                    <button onclick="editUser(${index})" style="background:#ff9900;">Edit</button>
                </td>
                <td>${deleteBtn}</td>
            </tr>`;
        });
        html += "</table>";
    } else if (type === 'Deps') {
        html = `<h3>Deposit Requests</h3>
                <table border='1' style='width:100%; color:white; font-size:10px; border-collapse:collapse;'>
                <tr>
                    <th>User</th>
                    <th>Amt</th>
                    <th>Bonus</th>
                    <th>TID</th>
                    <th>Proof</th>
                    <th>Action</th>
                </tr>`;
        
        logs.forEach((log) => {
            if (log.type === 'Deposit') {
                html += `<tr>
                    <td>${log.user}</td>
                    <td>${log.amount || log.amt}</td>
                    <td style="color:#ff9900; font-weight:bold;">+${log.bonus || 0}</td>
                    <td>${log.tid}</td>
                    <td><img src="${log.image}" style="width:30px;" onclick="showFullImage('${log.image}')"></td>
                    <td>
                        ${log.status === 'Pending' ? `
                            <button onclick="approveDep('${log.tid}')" style="background:#28a745; color:white; border:none; padding:5px 8px; border-radius:4px; font-weight:bold;">OK</button>
                            <button onclick="rejectDep('${log.tid}')" style="background:#dc3545; color:white; border:none; padding:5px 8px; border-radius:4px; font-weight:bold;">X</button>
                        ` : `
                            <span style="color:#888; font-weight:bold;">${log.status}</span>
                        `}
                    </td>
                </tr>`;
            }
        });
        html += "</table>";
    } else if (type === 'Wits') {
        html = `<h3>Pending Withdrawals</h3><table border='1' style='width:100%; color:white; font-size:10px; border-collapse:collapse;'>
                <tr><th>User</th><th>Amt</th><th>Bank</th><th>Acc Info</th><th>Action</th></tr>`;
        let wits = logs.filter(l => l.type === 'Withdraw' && l.status === 'Pending');
        wits.forEach((w) => {
            html += `<tr><td>${w.user}</td><td>${w.amount}</td><td>${w.bank}</td><td>${w.accName}<br><span style="color:#888;">${w.accNo}</span></td>
                <td><button onclick="approveWit('${w.id}')" style="background:green;">OK</button>
                <button onclick="rejectWit('${w.id}')" style="background:red;">X</button></td></tr>`;
        });
        html += "</table>";
    }
    dataDiv.innerHTML = html;
}

// Ye naya function bhi script ke niche add karein
function deleteUser(index) {
    if (confirm("Kya aap waqai is account ko hamesha ke liye khatam karna chahte hain?")) {
        users.splice(index, 1);
        save();
        loadAdmin('Users');
        alert("User Deleted Successfully!");
    }
}

function showFullImage(src) {
    let viewer = document.createElement('div');
    viewer.style = "position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.9); z-index:9999; display:flex; align-items:center; justify-content:center;";
    viewer.innerHTML = `<img src="${src}" style="max-width:90%; max-height:90%;">`;
    viewer.onclick = function() { document.body.removeChild(viewer); };
    document.body.appendChild(viewer);
}
function approveDep(tid) {
    let currentLogs = JSON.parse(localStorage.getItem('kpk_logs')) || [];
    let currentUsers = JSON.parse(localStorage.getItem('kpk_users')) || [];

    let logIndex = currentLogs.findIndex(l => l.tid == tid);
    if (logIndex === -1) return alert("Log nahi mila!");

    let log = currentLogs[logIndex];
    if (log.status === "Approved") return alert("Pehle hi approve ho chuka hai!");

    let depositAmt = parseFloat(log.amount || log.amt || 0);
    let userIndex = currentUsers.findIndex(u => u.username === log.user);
    if (userIndex === -1) return alert("User nahi mila!");

    // --- 1. ADMIN SE BONUS POOCHNA (10% Suggestion) ---
    let suggestedBonus = Math.floor(depositAmt * 0.10);
    let bonusInput = prompt("User Bonus (10% suggestion):", suggestedBonus);
    if (bonusInput === null) return;
    let bonusAmount = parseFloat(bonusInput) || 0;

    // --- 2. REFERRAL LOGIC (Invite Bonus) ---
    let currentUser = currentUsers[userIndex];
    
    // Check: Agar user pehli baar deposit kar raha hai aur amount 500 se zyada hai
    if (!currentUser.hasDeposited && depositAmt >= 500 && currentUser.invitedBy) {
        let inviterIndex = currentUsers.findIndex(u => u.username === currentUser.invitedBy);
        
        if (inviterIndex > -1) {
            if (!currentUsers[inviterIndex].referralCount) currentUsers[inviterIndex].referralCount = 0;
            
            currentUsers[inviterIndex].referralCount += 1;
            let count = currentUsers[inviterIndex].referralCount;
            let inviteBonus = 0;

            if (count === 1) inviteBonus = 100;
            else if (count === 2) inviteBonus = 200;
            else if (count === 5) inviteBonus = 500;
            else if (count === 10) inviteBonus = 1000;

                        if (inviteBonus > 0) {
                // 1. Inviter ka balance update karna
                currentUsers[inviterIndex].balance = (parseFloat(currentUsers[inviterIndex].balance) || 0) + inviteBonus;

                // 2. Anya (Inviter) ki history mein entry dalna taake usay pata chale
                let refLog = {
                    user: currentUser.invitedBy, 
                    type: 'Referral Bonus',
                    amount: inviteBonus,
                    status: 'Approved',
                    tid: 'REF-' + Math.floor(Math.random() * 1000000), 
                    date: new Date().toLocaleString(),
                    note: "Bonus from: " + currentUser.username 
                };
                currentLogs.push(refLog); // Ye line history mein save karegi

                alert("Referral Bonus! " + currentUser.invitedBy + " ko " + inviteBonus + " Rs mil gaye (Invite #" + count + ")");
            }

        }
    }

    // --- 3. FINAL UPDATES ---
    currentUsers[userIndex].balance = (parseFloat(currentUsers[userIndex].balance) || 0) + depositAmt + bonusAmount;
    currentUsers[userIndex].hasDeposited = true; 
    
    currentLogs[logIndex].status = "Approved";
    currentLogs[logIndex].bonus = bonusAmount;

    localStorage.setItem('kpk_users', JSON.stringify(currentUsers));
    localStorage.setItem('kpk_logs', JSON.stringify(currentLogs));
    users = currentUsers;
    logs = currentLogs;

    alert("Deposit Approved!");
    loadAdmin('Deps');
}

function rejectDep(tid) {
    let currentLogs = JSON.parse(localStorage.getItem('kpk_logs')) || [];
    let idx = currentLogs.findIndex(l => l.tid == tid);
    
    if (idx > -1) {
        currentLogs[idx].status = 'Rejected';
        localStorage.setItem('kpk_logs', JSON.stringify(currentLogs));
        
        // Global variable update
        logs = currentLogs;
        
        alert("Transaction Rejected!");
        loadAdmin('Deps'); // Table refresh
    }
}

function rejectDep(tid) {
    let idx = logs.findIndex(l => l.tid === tid);
    if (idx > -1) { logs[idx].status = "Rejected"; save(); loadAdmin('Deps'); }
}

function approveWit(id) {
    let idx = logs.findIndex(l => l.id == id);
    if (idx > -1) { logs[idx].status = "Approved"; save(); loadAdmin('Wits'); }
}

function rejectWit(id) {
    let idx = logs.findIndex(l => l.id == id);
    if (idx > -1) {
        let user = users.find(u => u.username === logs[idx].user);
        if (user) user.balance += logs[idx].amount;
        logs[idx].status = "Rejected"; save(); loadAdmin('Wits');
    }
}

function toggleBlock(index) {
    users[index].status = (users[index].status === 'active') ? 'blocked' : 'active';
    save(); loadAdmin('Users');
}

function editUser(index) {
    let n = prompt("New Bal:", users[index].balance);
    if (n !== null) { users[index].balance = parseFloat(n); save(); loadAdmin('Users'); }
}

function clearLogs() { if(confirm("Clear All?")) { logs=[]; save(); location.reload(); } }


function updateUI() {
    if (loggedInUser) {
        // 1. Home Page ka balance update karna
        let balDisp = document.getElementById('userBal');
        if (balDisp) {
            // Hum .toFixed(2) use kar rahe hain taakay point ke baad 2 numbers ayein
            balDisp.innerText = parseFloat(loggedInUser.balance).toFixed(2);
        }

        // 2. Welcome message update karna
        let userDisp = document.getElementById('displayUser');
        if (userDisp) {
            userDisp.innerText = "خوش آمدید، " + loggedInUser.username;
        }

        // Data ko local storage mein save karna
        save();
    }
}

function openProfile() {
    changePage('profilePage');
    if (loggedInUser) {
        // Profile page par user ka name dikhana (agar zaroorat ho)
        let refElement = document.getElementById('referDisplay');
        if (refElement) {
            refElement.innerText = loggedInUser.username;
        }
    }
}
function openInviteHistory() {
    // 1. Page change karein
    changePage('inviteHistoryPage');
    
    if (typeof loggedInUser === 'undefined' || !loggedInUser) return;

    // 2. Statistics update karein
    let totalCount = loggedInUser.referralCount || 0;
    if(document.getElementById('totalInvitesCount')) {
        document.getElementById('totalInvitesCount').innerText = totalCount;
    }

    // 3. Next Reward Logic
    let next = "";
    if (totalCount < 1) next = "1st invite par Rs 100 milenge (500+ dep)";
    else if (totalCount < 2) next = "2nd invite par Rs 200 milenge!";
    else if (totalCount < 5) next = (5 - totalCount) + " mazeed invites par Rs 500 milenge!";
    else if (totalCount < 10) next = (10 - totalCount) + " mazeed invites par Rs 1000 milenge!";
    else next = "Aap ne saare milestone mukammal kar liye hain!";
    
    if(document.getElementById('nextRewardInfo')) {
        document.getElementById('nextRewardInfo').innerText = next;
    }

    // 4. Invite History Table (currentLogs se)
    let inviteListDiv = document.getElementById('inviteList');
    if (inviteListDiv) {
        let html = "";
        
        // Check karein ke currentLogs exist karta hai
        if (typeof currentLogs !== 'undefined') {
            let myInvites = currentLogs.filter(l => l.user === loggedInUser.username && l.type === 'Referral Bonus');

            if (myInvites.length === 0) {
                html = "<p style='color:#666; text-align:center;'>Abhi tak koi valid invite nahi hai.</p>";
            } else {
                myInvites.forEach((inv, index) => {
                    html += `
                    <div style="background:#222; padding:12px; border-radius:8px; margin-bottom:10px; border-left:4px solid #ff9900; display:flex; justify-content:space-between;">
                        <div>
                            <b style="color:white;">Invite #${index + 1}</b><br>
                            <small style="color:#aaa;">${inv.note}</small>
                        </div>
                        <div style="color:#ff9900; font-weight:bold;">+Rs ${inv.amount}</div>
                    </div>`;
                });
            }
        }
        inviteListDiv.innerHTML = html;
    }
}


function copyMyLink() {
    if(!loggedInUser) return alert("Pehle login karein!");
    
    // Ye line invite link banaye gi
    let link = window.location.href.split('?')[0] + "?ref=" + loggedInUser.username;
    
    // Copy karne ka tareeka
    navigator.clipboard.writeText(link).then(() => {
        alert("Invite Link Copy Ho Gaya! Ab doston ko bhejain: " + link);
    }).catch(err => {
        alert("Link: " + link); // Agar browser support na kare to link dikha dega
    });
}

</script>
</body>
</html>
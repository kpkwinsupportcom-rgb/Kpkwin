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
    <div style="margin-bottom: 

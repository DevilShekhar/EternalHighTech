
<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Digital Marketing </title>
   <meta name="description" content="Digital Marketing">
  <link rel="stylesheet" href="styles.css">
   <link href="https://eternalhightech.com/assets/img/logo/EHT-C.png" rel="icon">
      <link href="https://eternalhightech.com/assets/img/logo/EHT-C.png" rel="apple-touch-icon">
</head>
<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Segoe UI", sans-serif;
}

body {
  background: radial-gradient(circle at top left, #2d1b69, #0b1220);
  color: #fff;
}

/* CONTAINER */
.container {
  max-width: 1200px;
  margin: auto;
  padding: 50px 20px;
}

/* LEFT CONTENT */
.hero-text {
  flex: 1;
}

.hero .container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 50px;
}

.badge {
  display: inline-block;
  padding: 8px 16px;
  background: rgba(255,255,255,0.1);
  border-radius: 20px;
  font-size: 14px;
  margin-bottom: 20px;
}

.hero-text h1 {
  font-size: 52px;
  line-height: 1.2;
  font-weight: 700;
}

.gradient-text {
  background: linear-gradient(90deg, #4facfe, #00f2fe);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.gradient-text.pink {
  background: linear-gradient(90deg, #ff6ec4, #7873f5);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.hero-text p {
  margin: 20px 0;
  color: #cbd5e1;
  line-height: 1.6;
}

/* BUTTONS */
.buttons {
  display: flex;
  gap: 15px;
  margin-top: 20px;
}

.btn {
  padding: 14px 22px;
  border-radius: 10px;
  text-decoration: none;
  font-size: 14px;
  transition: 0.3s;
}

.btn.primary {
  background: linear-gradient(90deg, #4f46e5, #d946ef);
  color: #fff;
}

.btn.secondary {
  border: 1px solid rgba(255,255,255,0.2);
  color: #fff;
}

.btn:hover {
  opacity: 0.85;
}

/* RIGHT CARD */
/* ===== HERO FORM FINAL ===== */
.hero {
  background: radial-gradient(circle at top left, #2d1b69, #0b1220);
  padding: 45px 0 35px;
}

.hero .container {
  max-width: 1200px;
  margin: auto;
  padding: 0 20px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 60px;
}

.hero-text {
  flex: 1;
}

.hero-text h1 {
  font-size: 60px;
  line-height: 1.08;
  font-weight: 800;
  margin-bottom: 18px;
  letter-spacing: -1px;
}

.hero-text p {
  max-width: 620px;
  margin: 22px 0 28px;
  color: #cbd5e1;
  line-height: 1.7;
  font-size: 17px;
}

.badge {
  display: inline-block;
  padding: 10px 18px;
  background: rgba(255,255,255,0.10);
  border-radius: 999px;
  font-size: 15px;
  margin-bottom: 22px;
  color: #fff;
}

.buttons {
  display: flex;
  gap: 15px;
  margin-top: 8px;
}

.btn {
  padding: 15px 24px;
  border-radius: 14px;
  text-decoration: none;
  font-size: 15px;
  transition: 0.3s ease;
}

.btn.primary {
  background: linear-gradient(90deg, #4f46e5, #d946ef);
  color: #fff;
}

.btn.secondary {
  border: 1px solid rgba(255,255,255,0.22);
  color: #fff;
  background: transparent;
}

.btn:hover {
  opacity: 0.9;
}

.hero-card {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
}

.hero-form-card.glass-card {
  width: 100%;
  max-width: 430px;
  height: auto;
  padding: 76px 22px;
  border-radius: 30px;
  background: rgba(8, 24, 54, 0.52);
  border: 1px solid rgba(255,255,255,0.08);
  box-shadow:
    0 20px 45px rgba(0,0,0,0.35),
    inset 0 1px 0 rgba(255,255,255,0.05),
    0 0 35px rgba(37,99,235,0.10);
  backdrop-filter: blur(18px);
  -webkit-backdrop-filter: blur(18px);
  display: block;
  overflow: visible;
}

.hero-form {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.hero-form .form-group {
  width: 100%;
}

.hero-form input,
.hero-form select {
  width: 100%;
  height: 50px;
  padding: 0 16px;
  border-radius: 14px;
  border: 1px solid rgba(255, 255, 255, 0.10);
  outline: none;
  background: rgba(255, 255, 255, 0.14);
  color: #f8fafc;
  font-size: 14px;
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  box-shadow:
    inset 0 1px 0 rgba(255,255,255,0.05),
    0 4px 14px rgba(0,0,0,0.10);
  transition: all 0.3s ease;
}

.hero-form input::placeholder {
  color: rgba(226, 232, 240, 0.70);
}

.hero-form select {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-image:
    linear-gradient(45deg, transparent 50%, #8b5cf6 50%),
    linear-gradient(135deg, #8b5cf6 50%, transparent 50%);
  background-position: calc(100% - 22px) 22px, calc(100% - 16px) 22px;
  background-size: 6px 6px, 6px 6px;
  background-repeat: no-repeat;
  cursor: pointer;
}


.hero-form input:focus,
.hero-form select:focus {
  border-color: rgba(168, 85, 247, 0.55);
  background: rgba(255, 255, 255, 0.18);
  box-shadow:
    0 0 0 3px rgba(168, 85, 247, 0.12),
    0 8px 20px rgba(79, 70, 229, 0.12);
}
.hero-check {
  display: flex;
  align-items: flex-start;
  gap: 10px;
  font-size: 14px;
  color: #cbd5e1;
  line-height: 1.5;
}

.hero-check input[type="checkbox"] {
  width: 18px;
  height: 18px;
  min-width: 18px;
  margin-top: 3px;
  accent-color: #8b5cf6;
  cursor: pointer;

  /* RESET BAD STYLES */
  appearance: auto;
  -webkit-appearance: checkbox;
  -moz-appearance: checkbox;
  border: none;
}
.hero-check input:checked {
  background: #d946ef;
  border-color: #d946ef;
}

.hero-check input:checked::after {
  content: "";
  position: absolute;
  top: 2px;
  left: 5px;
  width: 4px;
  height: 8px;
  border: solid #fff;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
}

@media (max-width: 600px) {
  .hero-check input {
    width: 16px;
    height: 16px;
    margin-top: 3px;
  }
  .container {
  max-width: 1200px;
  margin: auto;
  padding: 20px 20px !important;
}
}
@media (max-width: 900px) {
  .hero-check input {
    width: 17px;
    height: 17px;
  }
}
@media (min-width: 901px) {
  .hero-check input {
    width: 18px;
    /* height: 9px; */
  }
}

.hero-form-btn {
  width: 100%;
  height: 66px;
  border: none;
  border-radius: 999px;
  background: linear-gradient(90deg, #4f46e5, #d946ef);
  color: #fff;
  font-size: 16px;
  font-weight: 700;
  cursor: pointer;
  margin-top: 6px;
  box-shadow: 0 10px 24px rgba(255,152,0,0.28);
  transition: all 0.3s ease;
}

.hero-form-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 14px 30px rgba(255,152,0,0.35);
}

@media (max-width: 1100px) {
  .hero-text h1 {
    font-size: 58px;
  }

  .hero .container {
    gap: 40px;
  }
}

@media (max-width: 900px) {
  .hero .container {
    flex-direction: column;
    gap: 40px;
  }

  .hero-text h1 {
    font-size: 48px;
  }

  .hero-text p {
    font-size: 16px;
  }

  .hero-form-card.glass-card {
    max-width: 100%;
    padding: 70px 18px;
  }

  .hero-form input,
  .hero-form select {
    height: 56px;
    font-size: 14px;
  }

  .hero-form-btn {
    height: 40px;
  }
}
/* button responsive */
@media (max-width: 992px) {
  .buttons {
    gap: 12px;
  }

  .buttons .btn {
    padding: 12px 18px;
    font-size: 14px;
  }
}
/* tab button  */
@media (max-width: 600px) {
  .buttons {
    flex-direction: column;
    align-items: stretch;
    width: 100%;
  }

  .buttons .btn {
    width: 100%;
    text-align: center;
    padding: 14px;
    font-size: 15px;
  }
}


/* RESPONSIVE */
@media (max-width: 900px) {
  .features-grid {
    grid-template-columns: repeat(2, 1fr);
  }

  
}

 

  .glass-card {
    width: 100%;
    max-width: 400px;
    height: 280px;
  }
 


    @media (max-width: 900px) {
  .features-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 500px) {
  .features-grid {
    grid-template-columns: 1fr;
  }

  .features h2 {
    font-size: 30px;
  }
}
.feature-card:hover {
  transform: translateY(-10px) scale(1.02);
}









/* SECTION BACKGROUND */
/* ===== STATS SECTION (FIGMA STYLE) ===== */

.stats {
 
  text-align: center;
  color: #fff;
  position: relative;
  background-color: #0d1526;
}

.stats::before {
  content: "";
  position: absolute;
  top: -120px;
  left: 50%;
  transform: translateX(-50%);
  width: 700px;
  height: 350px;
  background: radial-gradient(circle, rgba(99,102,241,0.25), transparent 70%);
  filter: blur(90px);
  z-index: 0;
}

.stats .container {
  position: relative;
  z-index: 1;
  max-width: 1100px;
  margin: auto;
}

.stats h2 {
  font-size: 48px;
  font-weight: 700;
  margin-bottom: 20px;
}

.stats .subtitle {
  color: #94a3b8;
  max-width: 750px;
  margin: 0 auto 60px;
}

.stats-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 30px;
}

.card {
  padding: 45px 20px;
  border-radius: 20px;
  background: linear-gradient(145deg, rgba(255,255,255,0.06), rgba(255,255,255,0.02));
  border: 1px solid rgba(255,255,255,0.08);
  backdrop-filter: blur(10px);
  transition: all 0.3s ease;
}

.card:hover {
  transform: translateY(-8px);
  border-color: rgba(99,102,241,0.4);
  box-shadow: 0 20px 40px rgba(59,130,246,0.15);
}

.card h3 {
  font-size: 48px;
  margin-bottom: 10px;
}

.card p {
  color: #9ca3af;
}

/* RESPONSIVE */
@media (max-width: 900px) {
  .stats-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 500px) {
  .stats-grid {
    margin-top: 10px;
    grid-template-columns: 1fr;
  }

  .stats h2 {
    font-size: 28px;
  }
}
/* SECTION */
.features {
  padding: 100px 20px;
 background-color: #0d1526;
  color: #fff;
  text-align: center;
}

.container {
  max-width: 1100px;
  margin: auto;
}

/* TITLE */
.features h2 {
  font-size: 48px;
  font-weight: 700;
  margin-bottom: 15px;
}

.gradient-text {
  background: linear-gradient(90deg, #60a5fa, #a78bfa);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
/* SUBTEXT */
.subtitle {
  color: #94a3b8;
  max-width: 650px;
  margin: auto;
  margin-bottom: 40px;
  line-height: 1.6;
}

/* GRID */
.features-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 25px;
}

/* CARD */
.feature-card {
  position: relative;
  text-align: left;
  padding: 35px;
  border-radius: 20px;

  background: linear-gradient(145deg, rgba(255,255,255,0.05), rgba(255,255,255,0.02));
  border: 1px solid rgba(255,255,255,0.08);

  backdrop-filter: blur(12px);
  transition: all 0.35s ease;
  overflow: hidden;
}

.feature-card:hover {
  transform: translateY(-8px);
  border-color: rgba(99,102,241,0.6);
  box-shadow: 0 20px 40px rgba(79,70,229,0.25);
}


/* TEXT */
.feature-card h3 {
  font-size: 20px;
  margin-bottom: 10px;
}

.feature-card p {
  color: #9ca3af;
  font-size: 14px;
  line-height: 1.7;
}

/* RESPONSIVE */
@media (max-width: 900px) {
  .features-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 500px) {
  .features-grid {
    grid-template-columns: 1fr;
  }

  .features h2 {
    font-size: 28px;
  }
}
/* SECTION */
.services {
  background-color: #0d1526;
  color: #fff;
  text-align: center;
}

.container {
  max-width: 1100px;
  margin: auto;
}

/* TITLE */
.services h2 {
  font-size: 42px;
  font-weight: 700;
  margin-bottom: 10px;
}

.gradient-text {
  background: linear-gradient(90deg, #60a5fa, #a78bfa);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

/* SUBTEXT */
.subtitle {
  color: #94a3b8;
  max-width: 650px;
  margin: auto;
  margin-bottom: 40px;
  line-height: 1.6;
}

/* GRID */
.services-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 30px;
}

/* CARD */
.service-card {
  text-align: left;
  padding: 30px;
  border-radius: 20px;

  background: linear-gradient(
    145deg,
    rgba(255,255,255,0.05),
    rgba(255,255,255,0.02)
  );

  border: 1px solid rgba(255,255,255,0.08);
  backdrop-filter: blur(12px);

  transition: all 0.35s ease;
  position: relative;
}

.service-card:hover {
  transform: translateY(-8px);
  border-color: rgba(99,102,241,0.5);
  box-shadow: 0 20px 40px rgba(79,70,229,0.2);
}



/* TEXT */
.service-card h3 {
  font-size: 18px;
  margin-bottom: 10px;
}





.tags span {
  padding: 6px 12px;
  font-size: 12px;
  border-radius: 20px;

  background: rgba(59,130,246,0.1);
  border: 1px solid rgba(59,130,246,0.3);
  color: #93c5fd;
}

/* DIVIDER */
.divider {
  height: 1px;
  background: rgba(255,255,255,0.1);
  margin: 20px 0;
}

/* LINK */
.learn {
  color: #60a5fa;
  text-decoration: none;
  font-size: 14px;
}

.learn:hover {
  text-decoration: underline;
}

/* RESPONSIVE */



/* SECTION */
/* ===== PROCESS SECTION - FIGMA STYLE ===== */
/* ===== PROCESS SECTION ===== */
.process {
  background-color: #0d1526;
  color: #fff;
  text-align: center;
}

.process .container {
  max-width: 1240px;
  margin: 0 auto;
}

.process h2 {
  font-size: 54px;
  line-height: 1.08;
  font-weight: 800;
  margin-bottom: 16px;
  letter-spacing: -1px;
}

.process .subtitle {
  max-width: 760px;
  margin: 0 auto 64px;
  color: #93a4bf;
  font-size: 17px;
  line-height: 1.7;
}

.process .process-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 28px;
  position: relative;
  align-items: stretch;
}

.process .process-grid::before {
  content: "";
  position: absolute;
  top: 118px;
  left: 8%;
  width: 84%;
  height: 2px;
  background: rgba(59, 130, 246, 0.16);
  z-index: 0;
}

.process .process-card {
  position: relative;
  z-index: 1;
  padding: 72px 28px 34px;
  border-radius: 22px;
  background: linear-gradient(180deg, rgba(255,255,255,0.05), rgba(255,255,255,0.015));
  border: 1px solid rgba(255,255,255,0.10);
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.04);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  transition: all 0.35s ease;
}

.process .process-card:hover {
  transform: translateY(-8px);
  border-color: rgba(168, 85, 247, 0.55);
  box-shadow:
    0 18px 40px rgba(0, 0, 0, 0.28),
    0 0 0 1px rgba(168, 85, 247, 0.18),
    0 0 28px rgba(99, 102, 241, 0.12);
  background: linear-gradient(180deg, rgba(255,255,255,0.07), rgba(255,255,255,0.025));
}

.process .step {
  position: absolute;
  top: -20px;
  left: 50%;
  transform: translateX(-50%);
  width: 64px;
  height: 64px;
  border-radius: 50%;
  background: linear-gradient(135deg, #4f7cff 0%, #b05cff 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 17px;
  font-weight: 800;
  color: #fff;
  box-shadow: 0 10px 22px rgba(79,124,255,0.24);
}

.process .process-card .icon {
  width: 58px;
  height: 58px;
  border-radius: 16px;
  margin: 0 0 24px 0;
  background: linear-gradient(135deg, rgba(79,70,229,0.24), rgba(147,51,234,0.24));
  border: 1px solid rgba(99,102,241,0.18);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 27px;
  flex-shrink: 0;
}

.process .process-card h3 {
  font-size: 19px;
  line-height: 1.45;
  font-weight: 800;
  color: #f8fafc;
  margin: 0 0 16px 0;
  letter-spacing: -0.3px;
}

.process .process-card p {
  margin: 0;
  color: #9aa7bd;
  font-size: 14px;
  line-height: 1.8;
  max-width: 240px;
}

@media (max-width: 1100px) {
  .process .process-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
  }

  .process .process-grid::before {
    display: none;
  }

  .process h2 {
    font-size: 44px;
  }

  .process .process-card {
    min-height: 390px;
  }
}

@media (max-width: 600px) {


  .process h2 {
    font-size: 34px;
  }

  .process .subtitle {
    font-size: 15px;
    margin-bottom: 40px;
  }

  .process .process-grid {
    grid-template-columns: 1fr;
    gap: 20px;
  }

  .process .process-card {
    min-height: auto;
    
    border-radius: 20px;
  }

  .process .step {
    width: 58px;
    height: 58px;
    font-size: 16px;
    top: -18px;
  }

  .process .process-card .icon {
    width: 54px;
    height: 54px;
    font-size: 24px;
    margin-bottom: 20px;
  }

  .process .process-card h3 {
    font-size: 18px;
  }

  .process .process-card p {
    max-width: 100%;
    font-size: 14px;
    line-height: 1.7;
  }
}
/* SECTION */
/* ===== INDUSTRIES SECTION ===== */
/* ===== INDUSTRIES SECTION ===== */
.industries {
background-color: #0d1526;
  color: #fff;
  text-align: center;
}

.industries .container {
  max-width: 1280px;
  margin: 0 auto;
}

.industries h2 {
  font-size: 58px;
  line-height: 1.1;
  font-weight: 800;
  margin-bottom: 16px;
  letter-spacing: -1px;
}

.industries .subtitle {
  max-width: 760px;
  margin: 0 auto 50px;
  color: #9fb0c9;
  font-size: 17px;
  line-height: 1.7;
}

.industries .industries-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 24px;
}

.industries .industry-card {
  min-height: 120px;
  padding: 23px 28px;
  border-radius: 22px;
  background: linear-gradient(180deg, rgba(255,255,255,0.04), rgba(255,255,255,0.015));
  border: 1px solid rgba(255,255,255,0.10);
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.04);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);

  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 0;
  text-align: center;
  transition: all 0.35s ease;
}

.industries .industry-card:hover {
  transform: translateY(-4px);
  border-color: rgba(96,165,250,0.35);
  box-shadow:
    0 14px 30px rgba(0, 0, 0, 0.28),
    0 0 20px rgba(59,130,246,0.08);
}

.industries .industry-card.active {
  border-color: rgba(96,165,250,0.45);
  background: linear-gradient(180deg, rgba(37,99,235,0.09), rgba(255,255,255,0.02));
  box-shadow:
    0 14px 30px rgba(0, 0, 0, 0.30),
    0 0 18px rgba(59,130,246,0.10);
}

.industries .industry-icon {
  font-size: 34px;
  line-height: 1;
  display: block;
  margin-bottom: 19px;
}

.industries .industry-card span {
  display: block;
  margin: 0;
  color: #f3f7ff;
  font-size: 18px;
  line-height: 1.4;
  font-weight: 600;
}

@media (max-width: 1100px) {
  .industries .industries-grid {
    grid-template-columns: repeat(2, 1fr);
  }

  .industries h2 {
    font-size: 46px;
  }
}

@media (max-width: 600px) {


  .industries .industries-grid {
    grid-template-columns: 1fr;
    gap: 18px;
  }

  .industries h2 {
    font-size: 34px;
  }

  .industries .subtitle {
    font-size: 15px;
    margin-bottom: 36px;
  }

  .industries .industry-card {
    min-height: 130px;
    padding: 22px 16px;
    border-radius: 18px;
  }

  .industries .industry-icon {
    font-size: 28px;
    margin-bottom: 12px;
  }

  .industries .industry-card span {
    font-size: 16px;
  }
}

@media (max-width: 1100px) {
  .industries .industries-grid {
    grid-template-columns: repeat(2, 1fr);
  }

  .industries h2 {
    font-size: 50px;
  }
}

@media (max-width: 600px) {


  .industries .industries-grid {
    grid-template-columns: 1fr;
    gap: 18px;
  }

  .industries h2 {
    font-size: 34px;
  }

  .industries .subtitle {
    font-size: 15px;
    margin-bottom: 36px;
  }
  .service-card p {
 
    text-align: center !important;

}

  .industries .industry-card {
    min-height: 135px;
    border-radius: 20px;
    padding: 24px 18px;
  }

  .industries .industry-card i,
  .industries .industry-card .industry-icon {
    font-size: 28px;
  }

  .industries .industry-card span,
  .industries .industry-card h3 {
    font-size: 16px;
  }
}

/* RESPONSIVE - Tablet (2 columns) */
@media (max-width: 1024px) {
  .industries .industries-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
  }

  .industries h2 {
    font-size: 40px;
  }

  .industries .subtitle {
    margin-bottom: 50px;
  }
}

/* RESPONSIVE - Mobile (1 column) */
@media (max-width: 600px) {


  .industries .industries-grid {
    grid-template-columns: 1fr;
    gap: 18px;
  }

  .industries h2 {
    font-size: 32px;
    margin-bottom: 12px;
  }

  .industries .subtitle {
    font-size: 14px;
    margin-bottom: 40px;
  }

  .industries .industry-card {
    padding: 40px 24px;
    min-height: 160px;
    font-size: 15px;
  }
}
/* SECTION */
/* ===== WHY CHOOSE OUR AGENCY ===== */
.why {
  background-color: #0d1526;
  color: #fff;
  text-align: center;
}

.why .container {
  max-width: 1280px;
  margin: 0 auto;
}

.why h2 {
  font-size: 58px;
  line-height: 1.1;
  font-weight: 800;
  margin-bottom: 18px;
  letter-spacing: -1px;
}

.why .subtitle {
  max-width: 780px;
  margin: 0 auto 56px;
  color: #94a3b8;
  font-size: 18px;
  line-height: 1.7;
}

.why-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 34px;
}

.why-card {
  position: relative;
  text-align: left;
  padding: 34px 34px 30px;
  min-height: 310px;
  border-radius: 24px;
  background: linear-gradient(135deg, rgba(255,255,255,0.05), rgba(255,255,255,0.02));
  border: 1px solid rgba(255,255,255,0.10);
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.04);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  transition: all 0.3s ease;
}

.why-card:hover {
  transform: translateY(-4px);
  border-color: rgba(168,85,247,0.65);
  box-shadow:
    0 0 0 1px rgba(168,85,247,0.12),
    0 18px 40px rgba(0,0,0,0.24);
}

.why-card .icon {
  width: 62px;
  height: 62px;
  border-radius: 18px;
  background: linear-gradient(135deg, rgba(99,102,241,0.32), rgba(168,85,247,0.28));
  border: 1px solid rgba(139,92,246,0.18);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 30px;
  margin: 0 0 26px 0;
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.05);
}

.why-card h3 {
  font-size: 22px;
  line-height: 1.3;
  font-weight: 700;
  color: #f8fafc;
  margin-bottom: 18px;
  letter-spacing: -0.3px;
}

.why-card p {
  color: #9ca3af;
  font-size: 16px;
  line-height: 1.75;
  margin: 0;
}

/* Optional: keep second card highlighted all time */
.why-card.active-card {
  border-color: rgba(168,85,247,0.65);
  box-shadow:
    0 0 0 1px rgba(168,85,247,0.12),
    0 18px 40px rgba(0,0,0,0.24);
}

/* Tablet */
@media (max-width: 1100px) {
  .why-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 26px;
  }

  .why h2 {
    font-size: 46px;
  }

  .why-card {
    min-height: 290px;
  }
}

/* Mobile */
@media (max-width: 600px) {
 

  .why h2 {
    font-size: 34px;
  }

  .why .subtitle {
    font-size: 15px;
    margin-bottom: 38px;
  }

  .why-grid {
    grid-template-columns: 1fr;
    gap: 20px;
  }

  .why-card {
    min-height: auto;
    padding: 28px 24px;
    border-radius: 20px;
    text-align:center;
  }

  .why-card .icon {
    width: 56px;
    height: 56px;
    font-size: 26px;
    border-radius: 16px;
    margin-bottom: 22px;
  }
.why-card .icon {
  
    display: contents;
    background: linear-gradient(135deg, rgba(99, 102, 241, 0.32), rgba(168, 85, 247, 0.28));
    border: 1px solid rgba(139, 92, 246, 0.18);
           display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 30px;
    margin: 0 0 26px 0;
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.05);
}
  .why-card h3 {
    font-size: 20px;
    margin-bottom: 14px;
  }

  .why-card p {
    font-size: 15px;
    line-height: 1.7;
  }
}










/* CARD */

.brands h2{
     font-size: 58px;
    margin-bottom: 3rem;

}

/* SECTION */
.brands {
  padding: 50px 20px;
  background-color: #0d1526;
  text-align: center;
    line-height: 1.1;
    font-weight: 800;
    margin-bottom: 18px;
    letter-spacing: -1px;
}

/* TITLE */
.title {
  font-size: 12px;
  letter-spacing: 2px;
  margin-bottom: 40px;
}

/* WRAPPER (HIDES OVERFLOW) */
.brands-wrapper {
  overflow: hidden;
  position: relative;
}

/* TRACK (ANIMATION) */
.brands-track {
  display: flex;
  gap: 25px;
  width: max-content;
  animation: scroll 20s linear infinite;
}

/* CARD */
.brand {
  min-width: 20%;
  height: 100px;
  border-radius: 16px;
  background: #fff;
  border: 1px solid rgba(255,255,255,0.08);
  backdrop-filter: blur(10px);

  display: flex;
  align-items: center;
  justify-content: center;

  font-weight: 600;
  color: #9ca3af;
  transition: 0.3s;
}

/* HOVER EFFECT */
.brand:hover {
  transform: translateY(-5px);
  border-color: rgba(255,255,255,0.2);
  color: #fff;
}

/* ANIMATION */
@keyframes scroll {
  from {
    transform: translateX(0);
  }
  to {
    transform: translateX(-50%);
  }
}
/* SECTION */
.testimonials {
  padding: 60px 20px;
  background-color: #0d1526;
  color: #fff;
  text-align: center;
}

.container {
  max-width: 1100px;
  margin: auto;
}

/* TITLE */
.testimonials h2 {
  font-size: 42px;
  font-weight: 700;
}

.gradient-text {
  background: linear-gradient(90deg, #60a5fa, #a78bfa);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

/* SUBTEXT */
.subtitle {
  color: #94a3b8;
  margin: 15px auto 40px;
  max-width: 650px;
}

/* GRID */
.testimonial-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 25px;
}

/* CARD */
.testimonial-card {
  position: relative;
  text-align: left;
  padding: 30px;
  border-radius: 18px;
  background: rgba(255,255,255,0.03);
  border: 1px solid rgba(255,255,255,0.08);
  backdrop-filter: blur(12px);
  transition: 0.3s;
}

.testimonial-card:hover {
  transform: translateY(-6px);
  border-color: rgba(255,255,255,0.2);
}

/* STARS */
.stars {
  color: #facc15;
  margin-bottom: 15px;
}

/* TEXT */
.quote {
  color: #9ca3af;
  font-size: 14px;
  line-height: 1.6;
}

/* DIVIDER */
.divider {
  height: 1px;
  background: rgba(255,255,255,0.1);
  margin: 20px 0;
}

/* USER */
.user {
  display: flex;
  align-items: center;
  gap: 12px;
}

.avatar {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: linear-gradient(135deg, #4f46e5, #9333ea);
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
}

.user h4 {
  font-size: 14px;
}

.user span {
  font-size: 12px;
  color: #9ca3af;
}

/* QUOTE ICON */
.quote-icon {
  position: absolute;
  top: 20px;
  right: 20px;
  font-size: 40px;
  color: rgba(59,130,246,0.2);
}

/* BADGES */
.badges {
  margin-top: 50px;
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 15px;
}

.badges span {
  padding: 10px 18px;
  border-radius: 25px;
  background: rgba(255,255,255,0.05);
  border: 1px solid rgba(255,255,255,0.1);
  font-size: 13px;
}

/* RESPONSIVE */
@media (max-width: 900px) {
  .testimonial-grid {
    grid-template-columns: 1fr;
  }

  .testimonials h2 {
    font-size: 28px;
  }
}
/* SECTION BACKGROUND */

 /* ===== CTA SECTION ===== */
.cta-section {
  background-color: #0d1526;
  display: flex;
  justify-content: center;
}

.cta-box {
  width: 100%;
  max-width: 1080px;
  padding: 58px 64px 42px;
  border-radius: 30px;
  text-align: center;
  background: linear-gradient(135deg, rgba(37,99,235,0.20), rgba(147,51,234,0.20));
  border: 1px solid rgba(255,255,255,0.10);
  box-shadow:
    inset 0 1px 0 rgba(255,255,255,0.05),
    0 24px 60px rgba(0,0,0,0.32);
  backdrop-filter: blur(20px);
  -webkit-backdrop-filter: blur(20px);
}

.cta-box h2 {
  font-size: 66px;
  line-height: 1.02;
  font-weight: 800;
  margin-bottom: 22px;
  color: #fff;
  letter-spacing: -1.5px;
}

.cta-box .gradient-text {
  background: linear-gradient(90deg, #60a5fa, #7c83ff);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.cta-box .gradient-text.pink {
  background: linear-gradient(90deg, #8b5cf6, #c084fc);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.cta-text {
  max-width: 760px;
  margin: 0 auto 38px;
  color: #d7ddf0;
  font-size: 20px;
  line-height: 1.7;
}

.cta-buttons {
  display: flex;
  justify-content: center;
  gap: 16px;
  flex-wrap: wrap;
  margin-bottom: 46px;
}

.cta-buttons .btn {
  min-width: 265px;
  height: 66px;
  border-radius: 14px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  text-decoration: none;
  font-size: 17px;
  font-weight: 600;
  transition: all 0.3s ease;
}

.cta-buttons .btn.primary {
  color: #fff;
  background: linear-gradient(90deg, #2563eb, #a855f7);
  box-shadow: 0 12px 26px rgba(99,102,241,0.28);
}

.cta-buttons .btn.primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 16px 30px rgba(99,102,241,0.35);
}

.cta-buttons .btn.secondary {
  color: #fff;
  background: rgba(255,255,255,0.08);
  border: 1px solid rgba(255,255,255,0.20);
}

.cta-buttons .btn.secondary:hover {
  transform: translateY(-2px);
  background: rgba(255,255,255,0.12);
}

.cta-features {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 18px;
  flex-wrap: wrap;
  color: #b8c2db;
  font-size: 16px;
}

.cta-features span {
  display: inline-flex;
  align-items: center;
  gap: 8px;
}

@media (max-width: 1100px) {
  .cta-box {
    padding: 64px 40px 52px;
  }

  .cta-box h2 {
    font-size: 58px;
  }

  .cta-text {
    font-size: 18px;
  }
}

@media (max-width: 700px) {
  .cta-section {
    padding: 70px 16px;
  }

  .cta-box {
    padding: 44px 22px 38px;
    border-radius: 24px;
  }

  .cta-box h2 {
    font-size: 40px;
    line-height: 1.05;
    letter-spacing: -1px;
  }

  .cta-text {
    font-size: 16px;
    margin-bottom: 28px;
  }

  .cta-buttons {
    gap: 12px;
    margin-bottom: 30px;
  }

  .cta-buttons .btn {
    min-width: 100%;
    height: 58px;
    font-size: 16px;
  }

  .cta-features {
    gap: 10px;
    font-size: 14px;
  }
}
/* FOOTER */
.footer {
  padding: 50px 20px 30px;
   background: transparent !important;
  color: #cbd5e1;
}

/* CONTAINER */
.container {
  max-width: 1100px;
  margin: auto;
}

/* GRID */
.footer-grid {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr 1fr;
  gap: 40px;
}

/* LOGO */
.logo {
  font-size: 22px;
  font-weight: 700;
  background: linear-gradient(90deg, #60a5fa, #a78bfa);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

/* TEXT */
.desc {
  margin: 15px 0;
  font-size: 14px;
  color: #94a3b8;
  line-height: 1.6;
}

/* CONTACT */
.contact p {
  font-size: 14px;
  margin: 6px 0;
}

/* HEADINGS */
.footer-col h4 {
  color: #fff;
  margin-bottom: 15px;
  font-size: 15px;
}

/* LINKS */
.footer-col ul {
  list-style: none;
}

.footer-col li {
  margin-bottom: 10px;
  font-size: 14px;
  color: #94a3b8;
  cursor: pointer;
  transition: 0.3s;
}

.footer-col li:hover {
  color: #fff;
}

/* DIVIDER */
.divider {
  height: 1px;
  background: rgba(255,255,255,0.1);
  margin: 40px 0 20px;
}

/* BOTTOM */
.footer-bottom {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
}

/* SOCIAL ICONS */
.socials {
  display: flex;
  gap: 12px;
}

.socials span {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  background: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: 0.3s;
}

.socials span:hover {
  background: rgba(255,255,255,0.15);
}

/* LINKS */
.links a {
  margin-left: 20px;
  color: #94a3b8;
  font-size: 13px;
  text-decoration: none;
}

.links a:hover {
  color: #fff;
}

/* RESPONSIVE */
@media (max-width: 900px) {
  .footer-grid {
    grid-template-columns: 1fr 1fr;
  }
}

@media (max-width: 500px) {
  .footer-grid {
    grid-template-columns: 1fr;
  }

  .footer-bottom {
    flex-direction: column;
    gap: 15px;
    text-align: center;
  }
}
.stats .container {
  padding: 40px 20px !important;
}
/*feture card before css*/

.feature-card::before {
  content: "";
  position: absolute;
  inset: 0;
  border-radius: 20px;
  padding: 1px;

  background: linear-gradient(120deg, transparent, rgba(99,102,241,0.6), transparent);
  opacity: 0;
  transition: 0.4s;

  -webkit-mask:
    linear-gradient(#000 0 0) content-box,
    linear-gradient(#000 0 0);
  -webkit-mask-composite: xor;
  mask-composite: exclude;
}

.feature-card:hover::before {
  opacity: 1;
}

.feature-icon {
  margin-left: 0 !important;
  margin-right: auto !important;
}
.services .icon {
  margin: 0 0 20px !important;
}
.common-sections-bg {
  background-color: #0d1526;
}
/* ===== COMMON SECTIONS BACKGROUND form ===== */
/* ===== CUSTOM DROPDOWN ===== */
.custom-select {
  position: relative;
  width: 100%;
  /* z-index: 10; */
  overflow: visible !important;
}

.select-btn {
  width: 100%;
  height: 40px;
  padding: 0 16px;
  border-radius: 14px;
  border: 1px solid rgba(255, 255, 255, 0.10);
  outline: none;
  background: rgba(255, 255, 255, 0.14);
  color: #f8fafc;
  font-size: 14px;
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  box-shadow:
    inset 0 1px 0 rgba(255,255,255,0.05),
    0 4px 14px rgba(0,0,0,0.10);
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: space-between;
  cursor: pointer;
}

.select-btn .arrow {
  width: 10px;
  height: 10px;
  border-right: 2px solid rgba(167, 139, 250, 0.95);
  border-bottom: 2px solid rgba(167, 139, 250, 0.95);
  transform: rotate(45deg);
  transition: transform 0.3s ease, border-color 0.3s ease;
  margin-right: 4px;
  flex-shrink: 0;
}

.select-btn.active {
  border-color: rgba(168, 85, 247, 0.55);
  background: rgba(255, 255, 255, 0.18);
  box-shadow:
    0 0 0 3px rgba(168, 85, 247, 0.12),
    0 8px 20px rgba(79, 70, 229, 0.12);
}

.select-dropdown {
  position: absolute;
  /* top: calc(100% + 8px); */
  left: 0;
  width: 100%;
  background: rgba(15, 23, 42, 0.96);
  border: 1px solid rgba(255,255,255,0.08);
  border-radius: 14px;
  padding: 8px;
  box-shadow: 0 16px 35px rgba(0,0,0,0.35);
  backdrop-filter: blur(16px);
  -webkit-backdrop-filter: blur(16px);
  display: none;
  z-index: 9999;
  position: absolute;
  left: 0;
  /* max-height: 220px;
  overflow-y: auto; */
  /* max-height: none; */
  overflow-y: auto;
  max-height: 300px;
  top: 100%;
}

/* Only Business Goal dropdown opens upward */
.goal-select .select-dropdown {
  top: auto;
  bottom: calc(100% + 8px);  /* ðŸ‘ˆ open upward */
}

.select-dropdown.show {
  display: block;
}

.select-option {
    text-align: left;
      padding: 12px 14px;
      border-radius: 10px;
      color: #e5e7eb;
      font-size: 14px;
      cursor: pointer;
      transition: all 0.25s ease;
}

.select-option:hover {
  background: rgba(139, 92, 246, 0.18);
  color: #fff;
}
html {
  scroll-behavior: smooth;
}

.footer-col ul {
  list-style: none;
  padding: 0;
}

.footer-col li {
  margin-bottom: 10px;
}

.footer-col li a {
  color: #94a3b8;
  font-size: 14px;
  text-decoration: none;
  transition: 0.3s ease;
}

.footer-col li a:hover {
  color: #fff;
}


/* samadhan popup form css */
.popup-overlay {
  position: fixed;
  inset: 0;
  background: rgba(2, 6, 23, 0.78);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px 0;
  opacity: 0;
  visibility: hidden;
  pointer-events: none;
  z-index: 99999;
  transition: 0.35s ease;
}

.popup-overlay.active {
  opacity: 1;
  visibility: visible;
  pointer-events: auto;
}

.popup-form-card {
  position: relative;
  width: 460px;
  max-width: 430px;
  padding: 72px 20px;
  border-radius: 24px;
  background:
    linear-gradient(180deg, rgba(255,255,255,0.08), rgba(255,255,255,0.03)),
    rgba(10, 18, 40, 0.96);
  border: 1px solid rgba(255,255,255,0.10);
  box-shadow:
    0 30px 80px rgba(0,0,0,0.45),
    0 0 40px rgba(99,102,241,0.16),
    inset 0 1px 0 rgba(255,255,255,0.06);
  transform: scale(0.92) translateY(20px);
  transition: all 0.35s ease;
  overflow: visible;
  /* max-height: 95vh; */
  max-height: none;
  min-height: auto;
  height: auto;
}

.popup-overlay.active .popup-form-card {
  transform: scale(1) translateY(0);
}

.popup-close {
  position: absolute;
  top: 12px;
  right: 12px;
  width: 42px;
  height: 42px;
  border: 1px solid rgba(255,255,255,0.08);
  border-radius: 50%;
  background: linear-gradient(180deg, rgba(255,255,255,0.10), rgba(255,255,255,0.05));
  color: #ffffff;
  font-size: 24px;
  line-height: 1;
  cursor: pointer;
  z-index: 5;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow:
    0 10px 20px rgba(0,0,0,0.18),
    inset 0 1px 0 rgba(255,255,255,0.06);
  transition: all 0.3s ease;
}

.popup-close:hover {
  transform: rotate(90deg) scale(1.06);
  background: linear-gradient(180deg, rgba(99,102,241,0.22), rgba(217,70,239,0.16));
  border-color: rgba(168,85,247,0.34);
  box-shadow:
    0 14px 28px rgba(0,0,0,0.24),
    0 0 18px rgba(168,85,247,0.18);
}

.popup-top {
  text-align: center;
  margin-bottom: 18px;
}

.popup-badge {
  display: inline-block;
  padding: 8px 14px;
  border-radius: 999px;
  background: rgba(255,255,255,0.08);
  color: #e2e8f0;
  font-size: 13px;
  margin-bottom: 14px;
}

.popup-top h2 {
  font-size: 20px;
  line-height: 1.15;
  font-weight: 800;
  color: #fff;
}

.popup-top h2 span {
  background: linear-gradient(90deg, #60a5fa, #a78bfa, #d946ef);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.popup-top p {
  color: #94a3b8;
  font-size: 14px;
  line-height: 1.7;
  max-width: 360px;
  margin: 0 auto;
}

.popup-form {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.popup-form-group {
  width: 100%;
  position: relative;
}

.popup-form-group input,
.popup-form-group select,
.popup-form-group textarea {
  width: 100%;
  display: block;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  border: 1px solid rgba(255,255,255,0.10);
  background: rgba(255, 255, 255, 0.08);
  color: #f8fafc;
  border-radius: 14px;
  padding: 0 16px;
  outline: none;
  box-shadow:
    inset 0 1px 0 rgba(255,255,255,0.04),
    0 8px 18px rgba(0,0,0,0.14);
  transition: all 0.28s ease;
  font-size: 14px;
}

.popup-form-group input::placeholder,
.popup-form-group textarea::placeholder {
  color: rgba(226,232,240,0.68);
}

.popup-form-group input,
.popup-form-group select {
  height: 40px;
}

.popup-form-group textarea {
  min-height: 78px;
  padding: 14px 16px;
  resize: none;
}

.popup-form-group select {
  cursor: pointer;
  background-image:
    linear-gradient(45deg, transparent 50%, #a78bfa 50%),
    linear-gradient(135deg, #a78bfa 50%, transparent 50%);
  background-position: calc(100% - 22px) 22px, calc(100% - 16px) 22px;
  background-size: 6px 6px, 6px 6px;
  background-repeat: no-repeat;
  padding-right: 42px;
}

.popup-form-group input:focus,
.popup-form-group select:focus,
.popup-form-group textarea:focus {
  border-color: rgba(168,85,247,0.55);
  background: rgba(255,255,255,0.12);
  box-shadow:
    0 0 0 4px rgba(168,85,247,0.12),
    0 12px 24px rgba(79,70,229,0.16);
}
.popup-form-group select option {
  background: #111827;
  color: #f8fafc;
}


.popup-check {
  display: flex;
  align-items: flex-start;
  gap: 10px;
  color: #cbd5e1;
  font-size: 13px;
  line-height: 1.5;
}

.popup-check input {
  width: 16px;
  height: 16px;
  margin-top: 3px;
  accent-color: #8b5cf6;
  flex-shrink: 0;
}

.popup-submit-btn {
  width: 100%;
  height: 50px;
  border: none;
  border-radius: 16px;
  background: linear-gradient(90deg, #4f46e5, #7c3aed, #d946ef);
  color: #fff;
  font-size: 15px;
  font-weight: 700;
  cursor: pointer;
  box-shadow:
    0 14px 30px rgba(124,58,237,0.30),
    inset 0 1px 0 rgba(255,255,255,0.14);
  transition: all 0.3s ease;
}

.popup-submit-btn:hover {
  transform: translateY(-2px);
  box-shadow:
    0 20px 34px rgba(124,58,237,0.36),
    inset 0 1px 0 rgba(255,255,255,0.18);
}

body.popup-open {
  overflow: hidden;
}

@media (max-width: 600px) {
  .popup-form-card {
    max-width: 100%;
    padding: 20px 14px 16px;
    border-radius: 20px;
  }

  .popup-top h2 {
    font-size: 22px;
  }

  .popup-form-group input,
  .popup-form-group select {
    height: 48px;
    font-size: 14px;
  }

  .popup-form-group textarea {
    min-height: 76px;
    font-size: 14px;
  }

  .popup-submit-btn {
    height: 50px;
    border-radius: 14px;
  }

  .popup-close {
    width: 40px;
    height: 40px;
    font-size: 22px;
    top: 10px;
    right: 10px;
  }
  .brand {
    min-width: 40%;
  }
}
.popup-form-card input,
.popup-form-card select,
.popup-form-card textarea {
  background-color: rgba(255,255,255,0.08) !important;
  color: #f8fafc !important;
  border: 1px solid rgba(255,255,255,0.10) !important;
}
.service-popup-btn {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-width: 160px;
  height: 48px;
  padding: 0 20px;
  border: 1px solid rgba(99, 102, 241, 0.28);
  border-radius: 999px;
  background: linear-gradient(135deg, rgba(79,70,229,0.22), rgba(168,85,247,0.18));
  color: #f8fbff;
  font-size: 14px;
  font-weight: 600;
  font-family: "Segoe UI", sans-serif;
  line-height: 1;
  text-decoration: none;
  cursor: pointer;
  outline: none;
  box-shadow:
    inset 0 1px 0 rgba(255,255,255,0.08),
    0 10px 24px rgba(0,0,0,0.18),
    0 0 0 1px rgba(255,255,255,0.03);
  transition: all 0.3s ease;
}

.service-popup-btn:hover {
  transform: translateY(-2px);
  border-color: rgba(168,85,247,0.45);
  background: linear-gradient(90deg, rgba(79,70,229,0.34), rgba(217,70,239,0.24));
  color: #ffffff;
  box-shadow:
    0 16px 30px rgba(0,0,0,0.24),
    0 0 22px rgba(99,102,241,0.16);
}

.service-popup-btn:focus,
.service-popup-btn:focus-visible {
  outline: none;
  border-color: rgba(168,85,247,0.55);
  box-shadow:
    0 0 0 4px rgba(168,85,247,0.12),
    0 12px 26px rgba(79,70,229,0.18);
}

.service-popup-btn:active {
  transform: translateY(0);
}

/* Make last dropdown open upward */
.popup-form-group:last-of-type .select-dropdown {
  top: auto;
  bottom: calc(100% + 8px);
}

.select-dropdown {
  opacity: 0;
  transform: translateY(10px);
  transition: 0.25s ease;
}

.select-dropdown.show {
  opacity: 1;
  transform: translateY(0);
}


/* samadhan new css */
.services {
  background-color: #0d1526;
  color: #fff;
  text-align: center;
}

.services h2 {
  margin-bottom: 10px;
  font-size: 42px;
  font-weight: 700;
}

.services-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 30px;
}

.service-card {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  padding: 30px;
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 20px;
  background: linear-gradient(145deg, rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0.02));
  text-align: left;
  backdrop-filter: blur(12px);
  transition: all 0.35s ease;
}

.service-card:hover {
  transform: translateY(-8px);
  border-color: rgba(99, 102, 241, 0.5);
  box-shadow: 0 20px 40px rgba(79, 70, 229, 0.2);
}

.service-card .icon {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 50px;
  height: 50px;
  margin: 0 0 20px;
  border-radius: 12px;
  background: linear-gradient(135deg, #4f46e5, #9333ea);
  font-size: 22px;
}

.service-card h3 {
  margin-bottom: 10px;
  font-size: 18px;
}

.service-card p {
  margin-bottom: 20px;
  color: #9ca3af;
  font-size: 14px;
  line-height: 1.6;
  text-align:left;
}

.tags {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 15px;
}

.tags span {
  padding: 6px 12px;
  border: 1px solid rgba(59, 130, 246, 0.3);
  border-radius: 20px;
  background: rgba(59, 130, 246, 0.1);
  color: #93c5fd;
  font-size: 12px;
}

.service-card .divider {
  width: 100%;
  height: 1px;
  margin: 20px 0;
  background: rgba(255, 255, 255, 0.1);
}

.learn-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-width: 150px;
  height: 46px;
  padding: 0 18px;
  margin-top: auto;
  border: 1px solid rgba(96, 165, 250, 0.22);
  border-radius: 999px;
  background: linear-gradient(180deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0.03));
  color: #eaf2ff;
  font-size: 14px;
  font-weight: 600;
  cursor: pointer;
  box-shadow:
    inset 0 1px 0 rgba(255, 255, 255, 0.05),
    0 10px 24px rgba(0, 0, 0, 0.16);
  transition: all 0.3s ease;
}

.learn-btn:hover {
  transform: translateY(-2px);
  border-color: rgba(168, 85, 247, 0.4);
  background: linear-gradient(90deg, rgba(79, 70, 229, 0.22), rgba(217, 70, 239, 0.18));
  box-shadow:
    0 16px 30px rgba(0, 0, 0, 0.22),
    0 0 20px rgba(99, 102, 241, 0.14);
  color: #ffffff;
}

.learn-btn:active {
  transform: translateY(0);
}



@media (max-width: 600px) {
  .services-grid {
    grid-template-columns: 1fr;
  }
}


/*  */
/* =========================
Process Section
Samadhan add by reson
========================= */

.industries {
  background-color: #0d1526;
  color: #fff;
  text-align: center;
}

.industries .container {
  max-width: 1280px;
}

.industries h2 {
  margin-bottom: 16px;
  font-size: 58px;
  line-height: 1.1;
  font-weight: 800;
  letter-spacing: -1px;
}

.industries .subtitle {
  margin-bottom: 50px;
  color: #9fb0c9;
  font-size: 17px;
}

.industries-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 24px;
}

.industry-card {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  min-height: 130px;
  padding: 26px 28px;
  overflow: hidden;
  border: 1px solid rgba(255, 255, 255, 0.09);
  border-radius: 24px;
  background: linear-gradient(180deg, rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0.02));
  text-align: center;
  box-shadow:
    inset 0 1px 0 rgba(255, 255, 255, 0.04),
    0 10px 24px rgba(0, 0, 0, 0.18);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  transition: transform 0.35s ease, border-color 0.35s ease, box-shadow 0.35s ease, background 0.35s ease;
}

.industry-card::before {
  content: "";
  position: absolute;
  inset: 0;
  border-radius: 24px;
  background: radial-gradient(circle at top center, rgba(96, 165, 250, 0.16), transparent 65%);
  opacity: 0;
  transition: opacity 0.35s ease;
  pointer-events: none;
}

.industry-card:hover {
  transform: translateY(-10px) scale(1.02);
  border-color: rgba(96, 165, 250, 0.55);
  background: linear-gradient(180deg, rgba(37, 99, 235, 0.1), rgba(255, 255, 255, 0.03));
  box-shadow:
    0 20px 40px rgba(0, 0, 0, 0.3),
    0 0 28px rgba(59, 130, 246, 0.14);
}

.industry-card:hover::before {
  opacity: 1;
}

.industry-icon {
  display: block;
  margin-bottom: 19px;
  font-size: 34px;
  line-height: 1;
  transition: transform 0.35s ease, filter 0.35s ease;
}

.industry-card:hover .industry-icon {
  transform: translateY(-4px) scale(1.12);
  filter: drop-shadow(0 6px 14px rgba(96, 165, 250, 0.28));
}

.industry-card span {
  display: block;
  margin: 0;
  color: #f3f7ff;
  font-size: 19px;
  line-height: 1.4;
  font-weight: 700;
  transition: color 0.35s ease;
}

.industry-card:hover span {
  color: #ffffff;
}

@media (max-width: 1024px) {
  .industries-grid {
    grid-template-columns: repeat(2, 1fr);
  }

  .industries h2 {
    font-size: 40px;
  }
}

@media (max-width: 600px) {


  .industries-grid {
    grid-template-columns: 1fr;
    gap: 18px;
  }

  .industries h2 {
    margin-bottom: 12px;
    font-size: 32px;
  }

  .industries .subtitle {
    margin-bottom: 40px;
    font-size: 14px;
  }

  .industry-card {
    min-height: 160px;
    padding: 40px 24px;
    border-radius: 20px;
  }

  .industry-icon {
    margin-bottom: 12px;
    font-size: 28px;
  }

  .industry-card span {
    font-size: 16px;
  }
}

/* =========================
Industries Section
Samadhan add by reson
========================= */


/* hero section fix */
.hero,
.hero * {
  max-width: 100%;
}
.hero .container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 40px;
  flex-wrap: wrap;
  overflow: hidden; /* prevents child overflow */
}

.hero-card {
  flex: 1;
  min-width: 0; /* ðŸ”¥ VERY IMPORTANT FIX */
}

.hero-form-card {
  width: 100%;
  overflow: hidden;
}

.hero-form input,
.custom-select,
.select-btn {
  /* width: 100%; */
  max-width: 100%;
}

.select-dropdown {
  width: 100%;
  left: 0;
  right: 0;
}

@media (max-width: 600px) {
  .hero .container {
    flex-direction: column;
    padding: 0 15px;
  }

  .hero-text,
  .hero-card {
    width: 100%;
  }
}

/* final fix */
/* GLOBAL HARD FIX */
html, body {
  overflow-x: hidden;
}

/* Prevent any element from breaking layout */
* {
  max-width: 100%;
}

/* Fix big headings on mobile */
@media (max-width: 600px) {
  h1, .hero-text h1 {
    font-size: 34px !important;
    line-height: 1.2;
  }

  h2,
  .cta-box h2,
  .process h2,
  .industries h2,
  .why h2 {
    font-size: 28px !important;
  }
}

/* Fix large pseudo element */
.stats::before {
  max-width: 100%;
  width: 100%;
}

/* Fix container overflow */
.container {
  width: 100%;
  overflow: hidden;
}

/* Fix flex overflow */
.hero .container {
  flex-wrap: wrap;
  gap: 20px;
  text-align:center;
}

/* Prevent cards from expanding */
.hero-card,
.hero-text {
  min-width: 0;
}

@media (max-width: 600px) {
  .hero-check {
    align-items: flex-start;
  }

  .hero-check span {
    font-size: 12px;
  }
}

/* button desktop popup fix */
.buttons a {
  pointer-events: auto;
}

.popup-overlay {
  position: fixed;
  inset: 0;
  display: none;
  justify-content: center;
  align-items: center;
  background: rgba(0,0,0,0.6);
  z-index: 99999;
}

.popup-overlay.active {
  display: flex;
}

.open-popup-btn {
  position: relative;
  z-index: 10000;
}


/* mobile popup new css */
@media (max-width: 600px) {

  .popup-overlay {
    align-items: flex-start; /* push popup from top */
    padding: 12px;
  }

  .popup-form-card {
    width: 100%;
    max-width: 100%;
    
    height: auto;
    max-height: 90vh; /* âœ… fit inside screen */
    overflow-y: auto; /* âœ… scroll inside popup */
    
    border-radius: 18px;
    padding: 18px 14px 16px;

    transform: translateY(30px) scale(0.95);
  }

  .popup-overlay.active .popup-form-card {
    transform: translateY(0) scale(1);
  }

  /* smoother scrolling on mobile */
  .popup-form-card::-webkit-scrollbar {
    width: 4px;
  }

  .popup-form-card::-webkit-scrollbar-thumb {
    background: rgba(255,255,255,0.2);
    border-radius: 10px;
  }

  .popup-top h2 {
    font-size: 20px;
  }

  .popup-form-group input,
  .popup-form-group select {
    height: 46px;
    font-size: 14px;
  }

  .popup-form-group textarea {
    min-height: 70px;
  }

  .popup-submit-btn {
    height: 48px;
    font-size: 14px;
  }

  .popup-close {
    width: 36px;
    height: 36px;
    font-size: 20px;
  }
}

/* top padding fix */
.features,
.services,
.process,
.industries,
.why,
.cta-section,
.stats {
  padding-top: 0;
}

@media (max-width: 600px) {
  .features,
  .services,
  .process,
  .industries,
  .why,
  .cta-section,
  .stats {
    padding-top: 0px;   /* small breathing space */
    padding-bottom: 0px;
  }
    .service-card {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: anchor-center ;
    }
    .tags {
        display: grid;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 15px;
    }
    .service-card h3 {
      font-size: 18px;
      margin-bottom: 10px;
      text-align:center;
    }
    .footer-col {
    text-align: center;
}
.header-container {
 
  padding:0px 10px 0px 10px !important;
}
}
a.eternal {
    color: #fff;
    text-decoration: none;
}
@media (min-width: 601px) and (max-width: 1024px) {
  .features,
  .services,
  .process,
  .industries,
  .why,
  .cta-section,
  .stats {
    padding-top: 30px;   /* medium breathing space */
    padding-bottom: 50px;
  }

  .container {
    padding: 0 18px; /* slightly wider than mobile */
  }
}


/* Default (Desktop) â†’ Open Down */
.select-dropdown {
  top: 100%;
  bottom: auto;
}

/* Mobile â†’ Open Up */
@media (max-width: 768px) {
  .goal-select .select-dropdown.show {
    top: auto;
    bottom: calc(100% + 8px);
  }
}

/* Tablet Devices */
@media (min-width: 768px) and (max-width: 992px) {
  .goal-select .select-dropdown.show {
    top: auto;
    bottom: calc(100% + 8px);  /* Opens upward */
  }
}
/* Default: show mobile, hide desktop */
.industries.mobile {
  display: block;
}

.industries.desktop {
  display: none;
}

/* Desktop view (screen width 768px and above) */
@media (min-width: 768px) {
  .industries.mobile {
    display: none;
  }

  .industries.desktop {
    display: block;
  }
  .industry-card{
      min-width:50% !important;
  }
}
/* ===== MOBILE SLIDER FIX ===== */
.industries-slider {
  overflow: hidden;
  width: 100%;
}

.industries-track {
  display: flex;
  transition: transform 0.5s ease-in-out;
}

.industry-card {
  min-width: 100%;   /* ✅ ONE FULL CARD */
  margin: 0;         /* ❌ remove side gap */
  padding: 30px;
  box-sizing: border-box;
  flex-shrink: 0;
  text-align: center;
}
.site-header {
  width: 100%;
  padding: 15px 0;
  background: #fff;
  position: sticky;
  top: 0;
  z-index: 1000;
  border-bottom: 1px solid #eee;
}

.header-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding:0px 50px 0px 50px;
}

/* Logo */
.logo img {
  height: 60px;
  object-fit: contain;
}

/* CTA Button (optional tweak) */
.site-header .btn {
  padding: 10px 20px;
  font-size: 14px;
}
.socials a {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  margin: 5px;
  transition: 0.3s;
}

/* Default colors (brand colors) */
.socials a[aria-label="Facebook"] svg {
  fill: #1877F2;
  
    height: 20px;
    width: 20px;
}

.socials a[aria-label="Instagram"] svg {
  fill: #E4405F;
  
    height: 20px;
    width: 20px;
}

.socials a[aria-label="LinkedIn"] svg {
  fill: #0A66C2;
  
    height: 20px;
    width: 20px;
}

.socials a[aria-label="X"] svg {
  fill: #000000;
}

.socials a[aria-label="YouTube"] svg {
  fill: #FF0000;
  
    height: 20px;
    width: 20px;
}

/* Optional hover effect */
.socials a:hover svg {
  transform: scale(1.2);
  opacity: 0.8;
}
.text-white a{
    color:#fff;
    text-decoration: none;
}
@media (max-width: 992px) {
  .col-lg-6 {
    flex: 0 0 100%;
    max-width: 50%;
  }
}
.popup-form-group.mt-3 {
    text-align: left;
}
.mt-2 {
    margin-top: 10px;
}

</style>
<body>
<main>
    <header class="site-header">
  <div class="header-container">

    <!-- Logo -->
    <div class="logo">
      <img src="https://eternalhightech.com/assets/img/logo/ehtlogo.svg" alt="Logo">
    </div>

    <!-- CTA Button -->
    <a href="#" class="btn primary open-popup-btn">
     Get in Touch →
    </a>

  </div>
</header>
<section class="hero" id="home">
  <div class="container">
    
    <!-- LEFT CONTENT -->
    <div class="hero-text">
      <span class="badge">🚀 Data-Driven Marketing Solutions</span>

      <h1>
        Digital Marketing <br>
        Services That Deliver <br>
        <span class="gradient-text">Measurable</span> <br>
        <span class="gradient-text pink">Business Growth</span>
      </h1>

      <p>
        We combine cutting-edge technology with proven strategies to drive real results.
        Our data-driven approach transforms your marketing efforts into a powerful engine
        for sustainable growth, delivering ROI that matters to your bottom line.
      </p>
  <button class="btn primary open-popup-btn">
         Let’s Grow Your Business →
        </button>
      <!--<div class="buttons">-->
     
      <!--  <a href="#" class="btn secondary">▶ Explore Services</a>-->
      <!--</div>-->
    </div>

    <!-- RIGHT SIDE FORM -->
    <div class="hero-card">
      <div class="glass-card hero-form-card">

     <form class="hero-form" action="{{ route('lead.store') }}" method="POST" id="heroForm">
    @csrf

    {{-- SUCCESS --}}
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    {{-- ERRORS --}}
    @if ($errors->any())
        <ul style="color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <!-- NAME -->
    <div class="form-group">
        <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
    </div>

    <!-- PHONE -->
    <div class="form-group">
        <input type="tel" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" required>
    </div>

    <!-- EMAIL -->
    <div class="form-group">
        <input type="email" name="email" placeholder="Email ID" value="{{ old('email') }}" required>
    </div>

    <!-- BUSINESS -->
    <div class="form-group">
        <input type="text" name="business_name" placeholder="Business Name" value="{{ old('business_name') }}" required>
    </div>

    <!-- MESSAGE -->
    <div class="form-group">
        <textarea name="message" placeholder="Message" required>{{ old('message') }}</textarea>
    </div>

    <!-- SERVICE -->
    <div class="form-group">
        <div class="custom-select">
            <button type="button" class="select-btn">
                <span>{{ old('services') ?? 'Select Service' }}</span>
                <span class="arrow"></span>
            </button>

            <div class="select-dropdown">
                <div class="select-option">Performance Marketing</div>
                <div class="select-option">SEO</div>
                <div class="select-option">Social Media Marketing</div>
                <div class="select-option">Content Marketing</div>
                <div class="select-option">Conversion Rate Optimization</div>
                <div class="select-option">Marketing Automation & Lead Nurturing</div>
            </div>

            <input type="hidden" name="services" value="{{ old('services') }}" required>
        </div>
    </div>

    <!-- OPTIONAL: BUDGET -->
    <div class="form-group">
        <input type="text" name="budget" placeholder="Monthly Budget" value="{{ old('budget') }}">
    </div>

    <!-- OPTIONAL: GOAL -->
    <div class="form-group">
        <input type="text" name="goal" placeholder="Business Goal" value="{{ old('goal') }}">
    </div>

    <button type="submit" class="hero-form-btn">
        Start Your Growth Journey
    </button>
</form>

      </div>
    </div>

  </div>
</section>
<section class="stats" id="stats">
  <div class="container">

    <h2>
      Proven Track Record of 
      <span class="gradient-text">Measurable Results</span>
    </h2>

    <p class="subtitle">
      We don't just promise growth we deliver it. Our data-driven strategies have
      consistently generated exceptional returns for businesses across industries,
      turning marketing investments into sustainable competitive advantages.
    </p>

    <div class="stats-grid">
      
      <div class="card">
        <h3 class="count" data-target="12" data-suffix="+">0</h3>
        <p>Years of Expertise</p>
      </div>

      <div class="card">
        <h3 class="count" data-target="850" data-suffix="+">0</h3>
        <p>Projects Delivered</p>
      </div>

      <div class="card">
        <h3 class="count" data-target="500" data-suffix="+">0</h3>
        <p>Active Clients</p>
      </div>

      <div class="card">
        <h3 class="count" data-target="98" data-suffix="%">0</h3>
        <p>Client Satisfaction</p>
      </div>

    </div>

  </div>
</section>
<!--  -->
<section class="services" id="services">

  <div class="container">

    <h2>
      Comprehensive 
      <span class="gradient-text">Marketing Services</span>
    </h2>

    <p class="subtitle">
      Full-spectrum digital marketing solutions designed to drive growth at every stage of your customer journey.
    </p>

    <div class="services-grid">

      <!-- CARD 1 -->
      <div class="service-card">
        <div class="icon">📊</div>
        <h3>Performance Marketing</h3>
        <p>
          Data-driven paid advertising campaigns across Google, Facebook, LinkedIn, and emerging platforms.
           We optimize every dollar spent for maximum ROI through continuous testing and refinement.
        </p>

        <div class="tags">
          <span>PPC Management</span>
          <span>Paid Social</span>
          <span>Display Advertising</span>
        </div>

        <div class="divider"></div>

        <button type="button" class="learn-btn open-popup-btn">Learn More →</button>
      </div>

      <!-- CARD 2 -->
      <div class="service-card">
        <div class="icon">🔍</div>
        <h3>SEO (Search Engine Optimization)</h3>
        <p>
          Dominate search results with technical excellence and content strategy. 
          We build sustainable organic visibility that drives qualified traffic and establishes market authority.
        </p>

        <div class="tags">
          <span>Technical SEO</span>
          <span>Content Strategy</span>
          <span>Link Building</span>
        </div>

        <div class="divider"></div>

        <button type="button" class="learn-btn open-popup-btn">Learn More →</button>
      </div>

      <!-- CARD 3 -->
      <div class="service-card">
        <div class="icon">🔗</div>
        <h3>Social Media Marketing</h3>
        <p>
          Build engaged communities and convert followers into customers. 
          Strategic content creation and community management that amplifies your brand across all major platforms.
        </p>

        <div class="tags">
          <span>Content Creation</span>
          <span>Community Management</span>
          <span>Influencer Marketing</span>
        </div>

        <div class="divider"></div>

        <button type="button" class="learn-btn open-popup-btn">Learn More →</button>
      </div>
      <!-- CARD 4 -->
<div class="service-card">
  <div class="icon">📄</div>
  <h3>Content Marketing</h3>
  <p>
   Compelling narratives that educate, engage, and convert. 
   From thought leadership to product content, we create assets that drive the entire customer journey.
  </p>

  <div class="tags">
    <span>Blog Content</span>
    <span>Video Production</span>
    <span>Whitepapers &amp; eBooks</span>
  </div>

  <div class="divider"></div>

  <button type="button" class="learn-btn open-popup-btn">Learn More →</button>
</div>

<!-- CARD 5 -->
<div class="service-card">
  <div class="icon">🖱️</div>
  <h3>Conversion Rate Optimization (CRO)</h3>
  <p>
    Transform traffic into revenue through systematic testing and optimization.
     We identify friction points and implement proven strategies to maximize conversions.
  </p>

  <div class="tags">
    <span>A/B Testing</span>
    <span>User Experience</span>
    <span>Landing Page Optimization</span>
  </div>

  <div class="divider"></div>

  <button type="button" class="learn-btn open-popup-btn">Learn More →</button>
</div>

<!-- CARD 6 -->
<div class="service-card">
  <div class="icon">⚙️</div>
  <h3>Marketing Automation &amp; Lead Nurturing</h3>
  <p>
    Intelligent systems that nurture leads and automate repetitive tasks.
     We build sophisticated workflows that deliver the right message at the right time.
  </p>

  <div class="tags">
    <span>Email Automation</span>
    <span>Lead Scoring</span>
    <span>CRM Integration</span>
  </div>

  <div class="divider"></div>
 <button type="button" class="learn-btn open-popup-btn">Learn More →</button>
</div>

    </div>
    

  </div>
</section>

<!--  -->
<section class="industries mobile">
  <div class="container">

    <h2>Industries <span style="color: purple;">We Serve</span></h2>

    <p class="subtitle">
      Deep expertise across diverse sectors, delivering tailored strategies.
    </p>

    <div class="industries-slider">
      <div class="industries-track">

        <div class="industry-card">
          <div class="industry-icon">💻</div>
          <span>SaaS & Technology</span>
        </div>

        <div class="industry-card">
          <div class="industry-icon">🛍️</div>
          <span>E-commerce & Retail</span>
        </div>

        <div class="industry-card">
          <div class="industry-icon">💰</div>
          <span>Financial Services</span>
        </div>

        <div class="industry-card">
          <div class="industry-icon">🏥</div>
          <span>Healthcare & Wellness</span>
        </div>

        <div class="industry-card">
          <div class="industry-icon">👔</div>
          <span>Professional Services</span>
        </div>

        <div class="industry-card">
          <div class="industry-icon">🏢</div>
          <span>Real Estate</span>
        </div>

        <div class="industry-card">
          <div class="industry-icon">📚</div>
          <span>Education & E-learning</span>
        </div>

        <div class="industry-card">
          <div class="industry-icon">⚙️</div>
          <span>Manufacturing & B2B</span>
        </div>

        <div class="industry-card">
          <div class="industry-icon">✈️</div>
          <span>Hospitality & Travel</span>
        </div>

        <div class="industry-card">
          <div class="industry-icon">🚗</div>
          <span>Automotive</span>
        </div>

        <div class="industry-card">
          <div class="industry-icon">🎬</div>
          <span>Media & Entertainment</span>
        </div>

        <div class="industry-card">
          <div class="industry-icon">🤝</div>
          <span>Non-Profit Organizations</span>
        </div>

      </div>
    </div>

  </div>
</section>

<section class="industries desktop" id="industries" >
  <div class="container">

    <h2>
      Industries <span class="gradient-text">We Serve</span>
    </h2>

    <p class="subtitle">
      Deep expertise across diverse sectors, delivering tailored strategies that address
      unique industry challenges and opportunities.
    </p>

    <div class="industries-grid">

      <div class="industry-card">
        <div class="industry-icon">💻</div>
        <span>SaaS &amp; Technology</span>
      </div>

      <div class="industry-card">
        <div class="industry-icon">🛍️</div>
        <span>E-commerce &amp; Retail</span>
      </div>

      <div class="industry-card">
        <div class="industry-icon">💰</div>
        <span>Financial Services</span>
      </div>

      <div class="industry-card">
        <div class="industry-icon">🏥</div>
        <span>Healthcare &amp; Wellness</span>
      </div>

      <div class="industry-card">
        <div class="industry-icon">👔</div>
        <span>Professional Services</span>
      </div>

      <div class="industry-card ">
        <div class="industry-icon">🏢</div>
        <span>Real Estate</span>
      </div>

      <div class="industry-card">
        <div class="industry-icon">📚</div>
        <span>Education &amp; E-learning</span>
      </div>

      <div class="industry-card">
        <div class="industry-icon">⚙️</div>
        <span>Manufacturing &amp; B2B</span>
      </div>

      <div class="industry-card">
        <div class="industry-icon">✈️</div>
        <span>Hospitality &amp; Travel</span>
      </div>

      <div class="industry-card">
        <div class="industry-icon">🚗</div>
        <span>Automotive</span>
      </div>

      <div class="industry-card">
        <div class="industry-icon">🎬</div>
        <span>Media &amp; Entertainment</span>
      </div>

      <div class="industry-card">
        <div class="industry-icon">🤝</div>
        <span>Non-Profit Organizations</span>
      </div>

    </div>

  </div>
</section>
<!-- our  Proven -->
 <section class="process" id="process">
  <div class="container">

    <h2>
      Our Proven <span class="gradient-text">Process</span>
    </h2>

    <p class="subtitle">
      A systematic approach to digital marketing that delivers consistent, measurable results.
    </p>

    <div class="process-grid">

      <!-- STEP 1 -->
      <div class="process-card">
        <div class="step">01</div>
        <!--<div class="icon">💡</div>-->
        <h3>Discovery &amp; Strategy</h3>
        <p>
          We begin with comprehensive analysis of your business, competitors, and target audience.
           This foundation informs a customized strategy aligned with your specific goals and market position.
        </p>
      </div>

      <!-- STEP 2 -->
      <div class="process-card">
        <div class="step">02</div>
        <!--<div class="icon">🚀</div>-->
        <h3>Implementation &amp; Launch</h3>
        <p>
         Our team executes the strategy with precision, launching campaigns across chosen channels.
          Every element is carefully crafted and tested before going live to ensure optimal performance.
        </p>
      </div>

      <!-- STEP 3 -->
      <div class="process-card">
        <div class="step">03</div>
        <!--<div class="icon">📊</div>-->
        <h3>Monitoring &amp; Analysis</h3>
        <p>
         Continuous tracking and analysis of all campaign metrics. 
         Real-time dashboards provide complete visibility into performance, allowing rapid identification of opportunities.
        </p>
      </div>

      <!-- STEP 4 -->
      <div class="process-card">
        <div class="step">04</div>
        <!--<div class="icon">🔄</div>-->
        <h3>Optimization &amp; Scaling</h3>
        <p>
          Data-driven refinements maximize results over time.
           We systematically test, learn, and scale what works while eliminating inefficiencies to drive continuous improvement.


        </p>
      </div>

    </div>

  </div>
</section>


<section class="why" id="why-choose-us">

  <div class="container">

    <h2>
      Why Choose <span class="gradient-text"> Our Company</span>
    </h2>

    <p class="subtitle">
      We're not just another agency, we're your growth partner, committed to delivering
      exceptional results through proven methodologies and unwavering dedication.
    </p>

    <div class="why-grid">

      <div class="why-card">
        <div class="icon">📊</div>
        <h3>Data-Driven Strategies</h3>
        <p>Every decision backed by comprehensive analytics and market research.
           We let data guide our approach, ensuring strategies are built on evidence, not assumptions.


        </p>
      </div>

      <div class="why-card">
        <div class="icon">📄</div>
        <h3>Transparent Reporting</h3>
        <p>Complete visibility into campaign performance with real-time dashboards and detailed monthly reports. 
          You'll always know exactly where your investment is going and what it's delivering.</p>
      </div>

      <div class="why-card">
        <div class="icon">👥</div>
        <h3>Dedicated Account Management</h3>
        <p>A senior strategist dedicated to your success, serving as your single point of contact.
           Your account manager becomes an extension of your team, deeply understanding your business.

        </p>
      </div>

      <div class="why-card">
        <div class="icon">📈</div>
        <h3>Continuous Optimization</h3>
        <p>Marketing never stands still, and neither do we.
           Ongoing testing, refinement, and improvement ensure your campaigns perform better every month.</p>
      </div>

      <div class="why-card">
        <div class="icon">📦</div>
        <h3>Scalable Growth Systems</h3>
        <p>Infrastructure designed to grow with your business.
           Our strategies and systems scale seamlessly as you expand into new markets and segments.</p>
      </div>

      <div class="why-card">
        <div class="icon">🎯</div>
        <h3>Focus on Measurable Outcomes</h3>
        <p>We're obsessed with results that matter to your bottom line. 
          Every campaign is designed around clear KPIs that directly impact revenue and growth.</p>
      </div>

    </div>

  </div>
</section>
<section class="brands" id="brands">
 <h2>Trusted By Leading <span class="gradient-text">Brands</span>
    </h2>

  <div class="brands-wrapper">
    <div class="brands-track">

  <!-- LOGO ITEMS -->
  <div class="brand"><img src="images/1.webp" alt="Brand 1"></div>
  <div class="brand"><img src="images/7.webp" alt="Brand 2"></div>
  <div class="brand"><img src="images/3.webp" alt="Brand 3"></div>
  <div class="brand"><img src="images/4.webp" alt="Brand 4"></div>
  <!--<div class="brand"><img src="images/5.webp" alt="Brand 5"></div>-->
  <div class="brand"><img src="images/6.webp" alt="Brand 6"></div>
  <div class="brand"><img src="images/2.webp" alt="Brand 7"></div>


</div>
  </div>
</section>

<section class="cta-section" id="contact">

  <div class="cta-box">
    <h2>
       Let’s Grow Your <span class="gradient-text">Business</span><br>
       Together
      </h2>

    <p class="cta-text">
      Ready to transform your digital marketing and drive measurable results?
      Schedule a free consultation with our experts and discover how we can
      accelerate your growth.
    </p>

    <div class="cta-buttons">
      <a href="#" class="btn primary open-popup-btn" > Know More →</a>
      <a href="#" class="btn secondary">Contact Us</a>
    </div>

    <div class="cta-features">
      <span>✓ No credit card required</span>
      <span>•</span>
      <span>✓ Free 60-minute strategy session</span>
      <span>•</span>
      <span>✓ Custom growth roadmap</span>
    </div>
  </div>
</section>
<footer class="footer" id="footer">
  <div class="container">

    <div class="footer-grid">

      <!-- LEFT -->
      <div class="footer-col">
        <h3 class="logo">Eternal HighTech</h3>
        <p class="desc">
          Transforming businesses through data-driven digital marketing strategies
          that deliver measurable, sustainable growth.
        </p>

        <div class="contact">
          <p class="text-white">
          <a href="mailto:contact@eternalhightech.com">📧 contact@eternalhightech.com</a>
        </p>
        <p class="text-white">
          <a href="tel:+919028718877">📞 +91-90287-18877</a>
        </p>
          <!--<p>📍 San Francisco, CA 94105</p>-->
        </div>
      </div>

      <!-- SERVICES -->
      <div class="footer-col">
        <h4>Services</h4>
        <ul>
          <li><a href="#services">Performance Marketing</a></li>
          <li><a href="#services">SEO Services</a></li>
          <li><a href="#services">Social Media Marketing</a></li>
          <li><a href="#services">Content Marketing</a></li>
          <li><a href="#services">CRO Optimization</a></li>
          <li><a href="#services">Marketing Automation</a></li>
        </ul>
      </div>

      <!-- COMPANY -->
      <div class="footer-col">
        <h4>Company</h4>
        <ul>
          <li><a href="#home">About Us</a></li>
          <li><a href="#testimonials">Case Studies</a></li>
          <li><a href="#process">Our Process</a></li>
          <li><a href="#why-choose-us">Why Choose Us</a></li>
          <li><a href="#industries">Industries</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </div>

      <!-- RESOURCES -->
      <div class="footer-col">
        <h4>Resources</h4>
        <ul>
          <li><a href="#features">Marketing Guides</a></li>
          <li><a href="#stats">Industry Reports</a></li>
          <li><a href="#brands">Webinars</a></li>
          <li><a href="#services">Free Tools</a></li>
          <li><a href="#contact">Newsletter</a></li>
          <li><a href="#footer">Help Center</a></li>
        </ul>
      </div>

    </div>

    <div class="divider"></div>

    <div class="footer-bottom">
       <p>© Designed & Developed by  <a href="https://eternalhightech.com" class="eternal" target="_blank"> Eternal HighTech </a></p>

      <div class="socials">
         <span>
  <a href="https://www.facebook.com/Eternal-HighTech-106229152158477/?ref=pages_you_manage" target="_blank" aria-label="Facebook">
    <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
      <path d="M22 12a10 10 0 1 0-11.5 9.9v-7h-2.5v-2.9h2.5V9.5c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.3.2 2.3.2v2.5h-1.3c-1.3 0-1.7.8-1.7 1.6v1.9h2.9l-.5 2.9h-2.4v7A10 10 0 0 0 22 12"/>
    </svg>
  </a>
</span>

<span>
  <a href="https://www.instagram.com/eternalhightech/" target="_blank" aria-label="Instagram">
    <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
      <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm5 5a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm6.5-.8a1.2 1.2 0 1 1-2.4 0 1.2 1.2 0 0 1 2.4 0z"/>
    </svg>
  </a>
</span>

<span>
  <a href="https://www.linkedin.com/company/eternal-hightech/" target="_blank" aria-label="LinkedIn">
    <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
      <path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8h5v16H0V8zm7 0h4.8v2.2h.1c.7-1.3 2.3-2.7 4.7-2.7 5 0 5.9 3.3 5.9 7.5V24h-5v-7.6c0-1.8 0-4-2.4-4s-2.8 1.9-2.8 3.9V24H7V8z"/>
    </svg>
  </a>
</span>

<span>
  <a href="https://x.com/EternalHightech" target="_blank" aria-label="X">
    <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
      <path d="M18 2h3l-7 8 8 12h-6l-5-7-6 7H2l8-9-8-11h6l4 6 6-6z"/>
    </svg>
  </a>
</span>

<span>
  <a href="https://www.youtube.com/@eternalhightech" target="_blank" aria-label="YouTube">
    <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
      <path d="M23.5 6.2s-.2-1.6-.8-2.3c-.7-.9-1.6-.9-2-.9C17.6 2.8 12 2.8 12 2.8h0s-5.6 0-8.7.2c-.4 0-1.3 0-2 .9-.6.7-.8 2.3-.8 2.3S0 8.1 0 10v2c0 1.9.2 3.8.2 3.8s.2 1.6.8 2.3c.7.9 1.7.9 2.2 1 1.6.2 6.8.2 6.8.2s5.6 0 8.7-.2c.4 0 1.3 0 2-.9.6-.7.8-2.3.8-2.3s.2-1.9.2-3.8v-2c0-1.9-.2-3.8-.2-3.8zM9.5 14.6V7.8l6 3.4-6 3.4z"/>
    </svg>
  </a>
</span>
      </div>

      <div class="links">
        <a href="https://eternalhightech.com/privacy-policy" target="_blank">Privacy Policy</a>
        <a href="https://eternalhightech.com/terms-and-conditions" target="_blank">Terms of Service</a>
      </div>
    </div>

  </div>
</footer>
<!-- popup form -->
 <div class="popup-overlay" id="popupOverlay">
  <div class="popup-form-card">
    <button class="popup-close" id="closePopupBtn">&times;</button>

    <div class="popup-top">
      
      <h2>Let’s Understand <span>Your Business Needs</span></h2>
    </div>

    <form class="popup-form" action="submit.php" method="POST" id="popupForm">

  <div class="popup-form-group">
    <input type="text" name="full_name" placeholder="Full Name" required>
  </div>

  <div class="popup-form-group">
    <input type="tel" name="phone" placeholder="Phone Number" required>
  </div>

  <div class="popup-form-group">
    <input type="email" name="email" placeholder="Email ID" required>
  </div>

  <!-- ✅ SERVICE DROPDOWN -->
  <div class="popup-form-group">
    <div class="custom-select">
      <button type="button" class="select-btn">
        <span>Select Service</span>
        <span class="arrow"></span>
      </button>

      <div class="select-dropdown">
         <div class="select-option">Performance Marketing</div>
                  <div class="select-option">SEO</div>
                  <div class="select-option">Social Media Marketing</div>
                  <div class="select-option">Content Marketing</div>
                  <div class="select-option">Conversion Rate optimization</div>
                  <div class="select-option">Marketing automation and Lead Nurturing</div>
      </div>

      <input type="hidden" name="service_type" required>
    </div>
  </div>

  <!-- ✅ BUDGET DROPDOWN -->
  <div class="popup-form-group">
    <div class="custom-select">
      <button type="button" class="select-btn">
        <span>Select Monthly Budget</span>
        <span class="arrow"></span>
      </button>

      <div class="select-dropdown">
        <div class="select-option">₹50,000 - ₹1,00,000</div>
      <div class="select-option">₹1,00,000 - ₹5,00,000</div>
      <div class="select-option">₹5,00,000 - ₹25,00,000</div>
      <div class="select-option">₹25,00,000 - ₹50,00,000</div>
      <div class="select-option">₹50,00,000 - ₹1 Cr+</div>
      </div>

      <input type="hidden" name="budget" required>
    </div>
  </div>

  <!-- ✅ GOAL DROPDOWN -->
  <div class="popup-form-group">
    <div class="custom-select">
      <button type="button" class="select-btn">
        <span>Select Goal</span>
        <span class="arrow"></span>
      </button>

      <div class="select-dropdown">
        <div class="select-option">Generate Leads</div>
        <div class="select-option">Increase Website Traffic</div>
        <div class="select-option">Boost Sales</div>
        <div class="select-option">Improve Brand Awareness</div>
        <div class="select-option">Grow Social Media</div>
      </div>

      <input type="hidden" name="goal" required>
    </div>
  </div>

  <label class="popup-check">
    <input type="checkbox" required>
    <span>I agree to the privacy policy and terms.</span>
  </label>
<!-- CAPTCHA -->
      <div class="popup-form-group mt-3">
        <label id="captchaQuestion">
          🧮 What is <span id="num1"></span> + <span id="num2"></span>?
        </label>
        <input type="number" id="popupcaptchaInput" class="form-control mt-2" placeholder="Your Answer" required>
        <small id="popupcaptchaStatus" style="display:block;color:red;margin-top:5px;"></small>
        <small style="color: gray;">Solve this to prove you're human 😊</small>
      </div>
  <button type="submit" class="popup-submit-btn">
    Let’s Grow
  </button>

</form>
  </div>
</div>
<script>
// -------- POPUP FORM CAPTCHA --------
function generatePopupCaptcha() {
  let num1 = Math.floor(Math.random() * 10) + 1;
  let num2 = Math.floor(Math.random() * 10) + 1;

  document.getElementById('num1').innerText = num1;
  document.getElementById('num2').innerText = num2;

  return num1 + num2;
}

let popupCaptchaAnswer = generatePopupCaptcha();

document.getElementById('popupForm').addEventListener('submit', function(e) {
  let userAnswer = parseInt(document.getElementById('popupcaptchaInput').value);

  if (userAnswer !== popupCaptchaAnswer) {
    e.preventDefault();
    document.getElementById('popupcaptchaStatus').innerText = "❌ Incorrect answer! Please try again.";

    popupCaptchaAnswer = generatePopupCaptcha();
    document.getElementById('popupcaptchaInput').value = "";
  } else {
    document.getElementById('popupcaptchaStatus').innerText = "";
  }
});


// -------- HERO FORM CAPTCHA --------
function generateHeroCaptcha() {
  let num3 = Math.floor(Math.random() * 10) + 1;
  let num4 = Math.floor(Math.random() * 10) + 1;

  document.getElementById('num3').innerText = num3;
  document.getElementById('num4').innerText = num4;

  return num3 + num4;
}

let heroCaptchaAnswer = generateHeroCaptcha();

document.getElementById('heroForm').addEventListener('submit', function(e) {
  let userAnswer = parseInt(document.getElementById('heroCaptchaInput').value);

  if (userAnswer !== heroCaptchaAnswer) {
    e.preventDefault();
    document.getElementById('heroCaptchaStatus').innerText = "❌ Incorrect answer! Please try again.";

    heroCaptchaAnswer = generateHeroCaptcha();
    document.getElementById('heroCaptchaInput').value = "";
  } else {
    document.getElementById('heroCaptchaStatus').innerText = "";
  }
});
</script>
<!-- popup script -->
 <script>
  // const openPopupBtn = document.getElementById("openPopupBtn");
  const openPopupBtns = document.querySelectorAll(".open-popup-btn");
  const popupOverlay = document.getElementById("popupOverlay");
  const closePopupBtn = document.getElementById("closePopupBtn");


  function openPopup() {
    if (popupOverlay) {
      popupOverlay.classList.add("active");
      document.body.classList.add("popup-open");
    }
  }

  function closePopup() {
    if (popupOverlay) {
      popupOverlay.classList.remove("active");
      document.body.classList.remove("popup-open");
    }
  }

openPopupBtns.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    e.preventDefault();
    console.log("clicked schedule button");
    openPopup();
  });
});

  // morePopupBtns.forEach(function (btn) {
  //   btn.addEventListener("click", function () {
  //     openPopup();
  //   });
  // });

  if (closePopupBtn) {
    closePopupBtn.addEventListener("click", function () {
      closePopup();
    });
  }

  if (popupOverlay) {
    popupOverlay.addEventListener("click", function (e) {
      if (e.target === popupOverlay) {
        closePopup();
      }
    });
  }

  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") {
      closePopup();
    }
  });

  let popupAutoOpened = false;

 
</script>
<script>
  document.querySelectorAll('.custom-select').forEach(select => {
    const btn = select.querySelector('.select-btn');
    const dropdown = select.querySelector('.select-dropdown');
    const options = select.querySelectorAll('.select-option');
    const hiddenInput = select.querySelector('input[type="hidden"]');
    const label = btn.querySelector('span');

    btn.addEventListener('click', () => {
      document.querySelectorAll('.select-dropdown').forEach(d => {
        if (d !== dropdown) d.classList.remove('show');
      });
      document.querySelectorAll('.select-btn').forEach(b => {
        if (b !== btn) b.classList.remove('active');
      });

      dropdown.classList.toggle('show');
      btn.classList.toggle('active');
    });

    options.forEach(option => {
      option.addEventListener('click', () => {
        label.textContent = option.textContent;
        hiddenInput.value = option.textContent;
        dropdown.classList.remove('show');
        btn.classList.remove('active');
      });
    });
  });

  document.addEventListener('click', (e) => {
    if (!e.target.closest('.custom-select')) {
      document.querySelectorAll('.select-dropdown').forEach(d => d.classList.remove('show'));
      document.querySelectorAll('.select-btn').forEach(b => b.classList.remove('active'));
    }
  });
</script>

<!-- samadhan script  -->
 <script>
  const counters = document.querySelectorAll(".count");

  const startCounting = (counter) => {
    const target = +counter.getAttribute("data-target");
    const suffix = counter.getAttribute("data-suffix") || "";
    let current = 0;

    const increment = target <= 100 ? 1 : Math.ceil(target / 200);

    const updateCounter = () => {
      current += increment;

      if (current >= target) {
        counter.innerText = target + suffix;
      } else {
        counter.innerText = current + suffix;
        requestAnimationFrame(updateCounter);
      }
    };

    updateCounter();
  };

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const counter = entry.target;

        if (!counter.classList.contains("counted")) {
          counter.classList.add("counted");
          startCounting(counter);
        }

        observer.unobserve(counter);
      }
    });
  }, { threshold: 0.5 });

  counters.forEach((counter) => {
    observer.observe(counter);
  });
</script>
<script>
  const step2 = document.querySelector(".hitw-step-2");
  const step3 = document.querySelector(".hitw-step-3");
  const step4 = document.querySelector(".hitw-step-4");

  const loopSteps = [step2, step3, step4];
  let phase = 0;

  function resetLoopSteps() {
    loopSteps.forEach((step) => {
      if (!step) return;
      step.classList.remove("is-visible");
      step.classList.add("is-hidden");
    });
  }

  function runHitwLoop() {
    resetLoopSteps();

    if (phase === 0) {
      if (step2) {
        step2.classList.remove("is-hidden");
        step2.classList.add("is-visible");
      }
    }

    if (phase === 1) {
      if (step2) {
        step2.classList.remove("is-hidden");
        step2.classList.add("is-visible");
      }
      if (step3) {
        step3.classList.remove("is-hidden");
        step3.classList.add("is-visible");
      }
    }

    if (phase === 2) {
      if (step2) {
        step2.classList.remove("is-hidden");
        step2.classList.add("is-visible");
      }
      if (step3) {
        step3.classList.remove("is-hidden");
        step3.classList.add("is-visible");
      }
      if (step4) {
        step4.classList.remove("is-hidden");
        step4.classList.add("is-visible");
      }
    }

    phase++;
    if (phase > 3) {
      phase = 0;
    }

    if (phase === 3) {
      setTimeout(() => {
        resetLoopSteps();
      }, 1200);
    }
  }

  resetLoopSteps();
  setTimeout(() => {
    runHitwLoop();
    setInterval(runHitwLoop, 1800);
  }, 500);
</script>

<script>
const track = document.querySelector(".industries-track");
let cards = document.querySelectorAll(".industry-card");

// Clone all cards for infinite loop
cards.forEach(card => {
  track.appendChild(card.cloneNode(true));
});

let index = 0;
const total = cards.length;

function autoSlide() {
  if (window.innerWidth >= 768) return;

  index++;
  track.style.transition = "transform 0.5s ease-in-out";
  track.style.transform = `translateX(-${index * 100}%)`; // ✅ EXACT 100%

  // Reset loop
  if (index >= total) {
    setTimeout(() => {
      track.style.transition = "none";
      index = 0;
      track.style.transform = `translateX(0)`;
    }, 500);
  }
}

setInterval(autoSlide, 2500);
</script>
<script>
document.querySelector("form").addEventListener("submit", function(e) {
    let phone = document.querySelector("[name='phone']").value;

    if (!/^[0-9]{10}$/.test(phone)) {
        alert("Please enter valid 10 digit phone number");
        e.preventDefault();
    }
});
</script>
</main>
</body></html>
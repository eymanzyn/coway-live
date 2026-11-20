<!DOCTYPE html>
<html lang="ms">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Live Display – {{ $settings['agentName'] }}</title>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="Live Coway">
<meta name="theme-color" content="#0D3446">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,700;12..96,800&family=Figtree:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
:root{
  --bg:#EAF3F6; --surface:#FFFFFF; --ink:#0D3446; --muted:#557483;
  --water:#2BA7C9; --mint:#D3EFE6; --accent:#FF4F64; --accent-ink:#FFFFFF;
  --line:#CFE0E6; --pedestal:#DCEEF4;
  --glass:rgba(255,255,255,.72); --glass-line:rgba(13,52,70,.08);
  --stage-a:#FFFFFF; --stage-b:#D3E8F0; --glow:rgba(43,167,201,.30);
  --blob1:rgba(43,167,201,.20); --blob2:rgba(255,79,100,.10);
  --hot:#F26B1D; --cold:#2F80ED; --ice:#0FA3B1; --tank:#1E9E6A; --promo2:#FF8A4C;
  --display:"Bricolage Grotesque", "Arial Narrow", system-ui, sans-serif;
  --body:"Figtree", system-ui, -apple-system, "Segoe UI", sans-serif;
  box-sizing:border-box;
  padding-top:env(safe-area-inset-top,0px);
  padding-bottom:env(safe-area-inset-bottom,0px);
}
@media (prefers-color-scheme: dark){
  :root:not([data-theme="light"]){
    color-scheme:dark;
    --bg:#071D27; --surface:#0D2B38; --ink:#E8F4F8; --muted:#8FB0BE;
    --water:#4CC3E3; --mint:#123F3B; --accent:#FF6B7D; --line:#1D4252; --pedestal:#0F3545;
    --glass:rgba(13,43,56,.62); --glass-line:rgba(255,255,255,.08);
    --stage-a:#17485F; --stage-b:#08202B; --glow:rgba(76,195,227,.34);
    --blob1:rgba(76,195,227,.16); --blob2:rgba(255,107,125,.10);
    --hot:#FF9A52; --cold:#62AEFF; --ice:#4FD8E0; --tank:#3FD49A; --promo2:#FF9466;
  }
}
:root[data-theme="dark"]{
  color-scheme:dark;
  --bg:#071D27; --surface:#0D2B38; --ink:#E8F4F8; --muted:#8FB0BE;
  --water:#4CC3E3; --mint:#123F3B; --accent:#FF6B7D; --line:#1D4252; --pedestal:#0F3545;
  --glass:rgba(13,43,56,.62); --glass-line:rgba(255,255,255,.08);
  --stage-a:#17485F; --stage-b:#08202B; --glow:rgba(76,195,227,.34);
  --blob1:rgba(76,195,227,.16); --blob2:rgba(255,107,125,.10);
  --hot:#FF9A52; --cold:#62AEFF; --ice:#4FD8E0; --tank:#3FD49A; --promo2:#FF9466;
}
*,*::before,*::after{box-sizing:inherit}
html,body{height:100%;margin:0}
body{background:radial-gradient(900px 520px at 0% 0%, var(--blob1), transparent 70%),
    radial-gradient(800px 520px at 100% 100%, var(--blob2), transparent 70%), var(--bg);
  background-attachment:fixed;color:var(--ink);font-family:var(--body);font-size:16px;line-height:1.45;
  display:flex;flex-direction:column;overflow-x:hidden;overflow-y:auto;-webkit-text-size-adjust:100%}
.top,.cats,.foot{flex-shrink:0}
button,.plans tr{touch-action:manipulation;-webkit-tap-highlight-color:transparent}
button{font:inherit;color:inherit;cursor:pointer}
:focus-visible{outline:3px solid var(--water);outline-offset:2px}
.top,.spot,.queue,.cat:not([aria-selected="true"]){background:var(--glass)!important;-webkit-backdrop-filter:blur(18px) saturate(150%);
  backdrop-filter:blur(18px) saturate(150%);border:1px solid var(--glass-line)}
.top{border-width:0 0 1px}

/* Top bar */
.top{display:flex;align-items:center;gap:16px;padding:14px 24px;border-bottom:1px solid var(--line);background:var(--surface)}
.agent{display:flex;flex-direction:column;line-height:1.15}
.agent b{font-family:var(--display);font-size:1.35rem;font-weight:800;letter-spacing:-.01em}
.agent span{color:var(--muted);font-size:.9rem}
.live{display:inline-flex;align-items:center;gap:8px;background:var(--accent);color:var(--accent-ink);
  font-weight:700;padding:6px 12px;border-radius:999px;font-size:.9rem}
.live::before{content:"";width:9px;height:9px;border-radius:50%;background:currentColor;animation:blink 1.2s infinite}
@keyframes blink{50%{opacity:.25}}
.spacer{flex:1}
.tools{display:flex;gap:6px}
.icon{width:44px;height:44px;border-radius:12px;border:1.5px solid var(--line);background:transparent;display:grid;place-items:center;padding:0}
.icon svg{width:20px;height:20px}

/* Category tabs */
.cats{display:flex;gap:8px;padding:12px 24px;overflow-x:auto;scrollbar-width:none}
.cat{border:1.5px solid var(--line);background:var(--surface);padding:10px 18px;border-radius:999px;
  font-weight:600;white-space:nowrap;display:flex;gap:8px;align-items:center}
.cat small{color:var(--muted);font-weight:500}
.cat .ci{font-size:1.1rem;line-height:1}
.cat[aria-selected="true"]{background:var(--ink);color:var(--bg);border-color:var(--ink)}
.cat[aria-selected="true"] small{color:inherit;opacity:.7}

/* Stage */
.stage{flex:1 0 auto;display:grid;grid-template-columns:minmax(0,1fr) 340px;gap:20px;padding:4px 24px 16px}
.spot{position:relative;display:grid;grid-template-columns:minmax(0,.9fr) minmax(0,1.1fr);gap:28px;
  background:var(--surface);border-radius:28px;padding:28px;min-height:0;overflow:hidden}
.pedestal{background:radial-gradient(60% 55% at 50% 42%, var(--glow), transparent 72%),
    linear-gradient(165deg, var(--stage-a), var(--stage-b));
  border:1px solid var(--glass-line);border-radius:22px;display:grid;place-items:center;position:relative;min-height:240px;overflow:hidden}
.pedestal::before{content:"";position:absolute;left:16%;right:16%;bottom:5%;height:16%;border-radius:50%;
  background:radial-gradient(closest-side, rgba(255,255,255,.22), transparent);opacity:.7}
#hero{position:absolute;inset:10% 14% 12%;display:grid;grid-template:100% / 100%;place-items:center;z-index:1}
#hero > div{display:contents}
.pedestal svg,.pedestal img{width:100%;height:100%;object-fit:contain}
#hero img,#hero svg{filter:drop-shadow(0 22px 26px rgba(0,0,0,.30));animation:float 6s ease-in-out infinite}
.pedestal::after{content:"";position:absolute;left:24%;right:24%;bottom:8%;height:22px;border-radius:50%;
  background:radial-gradient(closest-side, rgba(0,0,0,.45), transparent);animation:shadow 6s ease-in-out infinite}
@keyframes float{50%{transform:translateY(-10px)}}
@keyframes shadow{50%{transform:scaleX(.86);opacity:.55}}
#hero.enter{animation:heroIn .55s cubic-bezier(.2,.8,.2,1)}
@keyframes heroIn{from{opacity:0;transform:translateX(var(--dir,40px)) scale(.95)}}
.info.enter > *{animation:fadeUp .45s cubic-bezier(.2,.8,.2,1) both}
.info.enter > :nth-child(2){animation-delay:.03s}.info.enter > :nth-child(3){animation-delay:.06s}
.info.enter > :nth-child(4){animation-delay:.09s}.info.enter > :nth-child(5){animation-delay:.12s}
.info.enter > :nth-child(6){animation-delay:.15s}.info.enter > :nth-child(7){animation-delay:.18s}
.info.enter > :nth-child(8){animation-delay:.21s}.info.enter > :nth-child(9){animation-delay:.24s}
.info.enter > :nth-child(10){animation-delay:.27s}
@keyframes fadeUp{from{opacity:0;transform:translateY(12px)}}
.badge{position:absolute;top:16px;left:16px;background:var(--glass);color:var(--ink);font-weight:700;
  -webkit-backdrop-filter:blur(10px);backdrop-filter:blur(10px);border:1px solid var(--glass-line);
  padding:6px 12px;border-radius:999px;font-size:.9rem;z-index:2}
.info{display:flex;flex-direction:column;min-height:0}
.info .catname{color:var(--water);font-weight:700}
.info h1{font-family:var(--display);font-weight:800;font-size:clamp(1.8rem,3.4vw,3.2rem);line-height:1.02;
  letter-spacing:-.02em;margin:6px 0 18px}
.price{display:flex;align-items:flex-end;gap:10px;line-height:.85}
.price .rm{font-family:var(--display);font-weight:700;font-size:clamp(1.6rem,2.4vw,2.4rem);padding-bottom:.35em}
.price .num .sen,.plan .amt .sen{font-size:.5em;letter-spacing:0;font-weight:inherit;color:inherit;display:inline;margin-left:0}
.price .num{font-family:var(--display);font-weight:800;font-size:clamp(4.5rem,8.5vw,8rem);letter-spacing:-.05em;color:var(--ink);font-variant-numeric:tabular-nums}
.price .per{font-size:1.1rem;color:var(--muted);padding-bottom:.5em}
.per b{color:var(--ink);font-weight:700}
.plans{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:10px;margin:20px 0 16px}
.plan{position:relative;display:flex;flex-direction:column;align-items:flex-start;gap:2px;text-align:left;
  padding:14px 14px 12px;border-radius:16px;border:1.5px solid var(--line);background:var(--bg);min-width:0;
  transition:transform .2s, border-color .2s, background-color .2s, box-shadow .2s}
.plan:hover{transform:translateY(-2px);border-color:var(--water)}
.plan .pl{font-weight:700;font-size:.9rem;color:var(--muted)}
.plan .amt{font-family:var(--display);font-weight:800;font-size:1.45rem;line-height:1.1;white-space:nowrap}
.plan .amt small{font-size:.78rem;font-weight:600;color:var(--muted);margin-left:2px}
.plan .nt{font-size:.8rem;color:var(--muted);line-height:1.25}
.plan[aria-checked="true"]{background:var(--ink);border-color:var(--ink);color:var(--bg);
  box-shadow:0 12px 26px -12px rgba(0,0,0,.55)}
.plan[aria-checked="true"] .pl,.plan[aria-checked="true"] .nt,.plan[aria-checked="true"] .amt small{color:inherit;opacity:.8}
.best{position:absolute;top:-10px;right:10px;background:linear-gradient(90deg,#1E9E6A,#2BC48A);color:#fff;
  font-style:normal;font-weight:800;font-size:.66rem;letter-spacing:.06em;padding:3px 8px;border-radius:999px;
  white-space:nowrap;box-shadow:0 4px 12px -4px rgba(30,158,106,.8)}
.info h1:has(+ .lead:not([hidden])){margin-bottom:4px}
.lead{margin:0 0 14px;font-size:1.2rem;color:var(--muted);font-weight:500}
.fit{margin:0 0 12px;background:var(--mint);border-radius:14px;padding:10px 14px;display:flex;flex-direction:column;gap:2px}
.fit span{font-size:.8rem;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--water)}
.fit b{font-size:1.1rem;font-weight:600}
.pedestal.photo #hero{inset:9% 18% 11%}
.pedestal.wide #hero{inset:14% 7% 22%}
.pedestal.wide::after{bottom:17%;left:18%;right:18%}
.pedestal.wide::before{bottom:13%}
.specs{list-style:none;margin:0 0 14px;padding:0;display:flex;flex-wrap:wrap;gap:8px}
.specs[hidden]{display:none}
.specs li{--c:var(--water);display:inline-flex;align-items:center;gap:8px;border-radius:999px;padding:4px 14px 4px 4px;
  background:color-mix(in srgb, var(--c) 13%, transparent);border:1.5px solid color-mix(in srgb, var(--c) 45%, transparent);
  font-weight:700;font-size:.92rem;letter-spacing:.03em;text-transform:uppercase;white-space:nowrap}
.specs li i{font-style:normal;width:28px;height:28px;border-radius:50%;display:grid;place-items:center;font-size:.95rem;
  background:color-mix(in srgb, var(--c) 28%, transparent)}
.colors{display:flex;align-items:center;gap:12px;flex-wrap:wrap;margin:0 0 14px}
.colors[hidden]{display:none}
.colors .cl{font-size:.9rem;color:var(--muted)}
.colors .cl b{color:var(--ink);font-weight:700}
.sw{display:flex;gap:9px;flex-wrap:wrap}
.dot{width:30px;height:30px;border-radius:50%;padding:0;background:var(--sw);border:2px solid var(--glass-line);
  box-shadow:inset 0 0 0 2px rgba(255,255,255,.35), 0 2px 6px rgba(0,0,0,.18);transition:transform .15s}
.dot:hover{transform:scale(1.12)}
.dot[aria-pressed="true"]{outline:2.5px solid var(--water);outline-offset:3px}
#hero.swap{animation:swap .35s ease}
@keyframes swap{from{opacity:0;transform:scale(.97)}}
.specs .sp-hot{--c:var(--hot)}.specs .sp-cold{--c:var(--cold)}.specs .sp-ice{--c:var(--ice)}.specs .sp-tank{--c:var(--tank)}
.feats{list-style:none;margin:0 0 auto;padding:0;display:grid;gap:8px}
.feats li{display:flex;gap:10px;align-items:flex-start;font-size:1.05rem}
.feats li::before{content:"";flex:none;width:10px;height:10px;margin-top:.45em;border-radius:50%;background:var(--water)}
.promo{margin-top:18px;background:linear-gradient(120deg, var(--accent), var(--promo2));color:var(--accent-ink);border-radius:16px;padding:14px 18px;
  font-weight:700;font-size:1.15rem;display:flex;justify-content:space-between;align-items:center;gap:12px;
  position:relative;overflow:hidden;box-shadow:0 14px 30px -14px var(--accent)}
.promo::after{content:"";position:absolute;inset:0;pointer-events:none;
  background:linear-gradient(100deg, transparent 30%, rgba(255,255,255,.38) 50%, transparent 70%);
  transform:translateX(-100%);animation:shine 3.4s ease-in-out infinite}
@keyframes shine{55%,100%{transform:translateX(100%)}}
.promo small{font-weight:500;opacity:.9;font-size:.9rem}
.nav{position:absolute;right:28px;top:28px;display:flex;gap:8px;align-items:center;color:var(--muted);font-size:.9rem}
.nav button{width:44px;height:44px;border-radius:50%;border:1.5px solid var(--line);background:transparent;font-size:1.1rem}

/* Queue */
.queue{background:var(--surface);border-radius:28px;padding:18px;display:flex;flex-direction:column;min-height:0}
.queue h2{font-family:var(--display);font-size:1.15rem;margin:4px 6px 12px;font-weight:700}
.list{list-style:none;margin:0;padding:0;overflow-y:auto;display:grid;gap:6px}
.item{display:grid;grid-template-columns:52px 1fr auto;gap:12px;align-items:center;width:100%;text-align:left;
  background:transparent;border:1.5px solid transparent;border-radius:14px;padding:8px}
.item .thumb{position:relative;width:52px;height:52px;border-radius:12px;display:grid;place-items:center;
  background:radial-gradient(70% 60% at 50% 45%, var(--glow), transparent 75%), linear-gradient(165deg, var(--stage-a), var(--stage-b))}
.item{transition:background-color .2s, border-color .2s, box-shadow .2s}
.item .thumb svg,.item .thumb img{width:70%;height:80%;object-fit:contain;min-height:0}
.item b{display:block;font-weight:600;line-height:1.2}
.item small{color:var(--muted)}
.cta svg{width:26px;height:26px;flex:none}
.item .p{font-family:var(--display);font-weight:700}
.item[aria-current="true"]{border-color:var(--water);background:color-mix(in srgb, var(--water) 10%, transparent);
  box-shadow:0 0 0 3px color-mix(in srgb, var(--water) 18%, transparent)}

/* Footer */
.foot{display:flex;align-items:stretch;background:var(--ink);color:var(--bg);min-height:56px}
.cta{flex:none;display:flex;align-items:center;gap:10px;padding:0 24px;background:var(--water);color:#06222D;font-weight:700;font-size:1.05rem}
.ticker{flex:1;overflow:hidden;display:flex;align-items:center}
.track{display:flex;gap:56px;white-space:nowrap;padding-left:40px;animation:scroll 40s linear infinite;font-weight:500}
@keyframes scroll{to{transform:translateX(-50%)}}

/* Help */
.help{position:fixed;inset:0;background:rgba(4,20,28,.6);display:none;place-items:center;z-index:20;padding:20px}
.help.open{display:grid}
.help div{background:var(--surface);border-radius:20px;padding:24px 28px;max-width:420px;width:100%}
.help h3{font-family:var(--display);margin:0 0 12px}
.help dl{display:grid;grid-template-columns:auto 1fr;gap:8px 16px;margin:0}
.help dt kbd{font-family:var(--body);font-weight:700;border:1.5px solid var(--line);border-radius:6px;padding:1px 8px}
.help dd{margin:0;color:var(--muted)}
.hint{position:fixed;right:16px;bottom:72px;font-size:.8rem;color:var(--muted);background:var(--surface);
  border:1px solid var(--line);padding:4px 10px;border-radius:8px}

@media (min-width:1001px){ .queue{max-height:calc(100dvh - 210px)} }
/* Laptop kecil & iPad landskap */
@media (max-width:1280px){
  .stage{grid-template-columns:minmax(0,1fr) 290px}
  .spot{grid-template-columns:minmax(0,.75fr) minmax(0,1.25fr);gap:22px;padding:22px}
  .plan{padding:12px 12px 10px}
  .plan .amt{font-size:1.3rem}
  .nav{top:22px;right:22px}
  .info h1{padding-right:140px}
}
@media (min-width:1001px) and (max-height:940px){
  .price .num{font-size:clamp(3.5rem,11vh,6rem)}
  .info h1{font-size:clamp(1.6rem,3vw,2.4rem);margin-bottom:10px}
  .feats li{font-size:.95rem}
}
@media (min-width:1001px) and (max-height:800px){
  .feats{display:none}
  .plan{padding:9px 11px 8px}
  .plan .amt{font-size:1.2rem}
  .cats{padding-top:8px;padding-bottom:8px}
  .top{padding-top:10px;padding-bottom:10px}
  .promo{margin-top:auto;padding:10px 16px;font-size:1.05rem}
  .promo small{white-space:nowrap}
  .lead{font-size:1.02rem;margin-bottom:8px}
  .fit{padding:6px 12px;margin-bottom:8px}
  .fit b{font-size:1rem}
  .plans{margin:16px 0 10px}
  .plan .nt{font-size:.74rem}
  .specs{margin-bottom:10px}
  .specs li{font-size:.82rem}
  .info h1{font-size:2.1rem}
}
@media (min-width:1001px) and (max-height:740px){
  .lead{display:none}
  .price .num{font-size:4.2rem}
  .catname{font-size:.9rem}
  .stage{padding-bottom:10px}
  .plan{padding:7px 10px 6px}
  .info h1{font-size:1.9rem}
}
/* iPad potret & phone landskap */
@media (max-width:1000px){
  .stage{grid-template-columns:minmax(0,1fr);gap:14px}
  .queue,.spot{min-width:0}
  .queue{padding:14px 0 14px 14px}
  .queue h2{margin-right:14px}
  .list{grid-auto-flow:column;grid-auto-columns:minmax(260px,46%);overflow-x:auto;overflow-y:hidden;
    scroll-snap-type:x mandatory;padding-right:14px;scrollbar-width:none}
  .list li{scroll-snap-align:start}
  .item{border-color:var(--line)}
  .top{flex-wrap:wrap;row-gap:10px}
  .agent b,.agent span{white-space:nowrap}
  .agent span{display:none}
  .top{gap:10px;padding-left:16px;padding-right:16px}
  .foot{position:sticky;bottom:0;z-index:5}
  .hint{display:none}
  .info h1{padding-right:150px}
}
/* iPad potret: header dua baris yang kemas */
@media (max-width:900px){
  .top{display:flex;flex-wrap:wrap;align-items:center}
  .agent{order:1;flex:1;min-width:0}.live{order:2}.tools{order:3}
}
/* Phone */
@media (max-width:640px){
  .top{display:flex;flex-wrap:wrap;gap:10px;padding:10px 14px;align-items:center}
  .agent{order:1;flex:1;min-width:0}.live{order:2}.tools{order:3}
  .agent span{display:none}
  .agent b{font-size:1.1rem}
  .cats{padding:10px 14px}
  .stage{padding:2px 14px 14px}
  .spot{grid-template-columns:1fr;padding:16px;gap:14px;border-radius:22px}
  .pedestal{min-height:180px;height:32vh;max-height:260px}
  .nav{position:static;order:-1;justify-content:space-between}
  .info h1{padding-right:0;margin:4px 0 12px}
  .price .num{font-size:clamp(4rem,22vw,6rem)}
  .feats li{font-size:1rem}
  .plans{gap:7px}
  .plan{padding:12px 9px 9px;border-radius:14px}
  .plan .amt{font-size:1.1rem}
  .plan .amt small{display:none}
  .plan .nt{font-size:.7rem}
  .best{right:6px;font-size:.6rem;padding:2px 6px}
  .specs li{font-size:.8rem;padding-right:11px}
  .specs li i{width:24px;height:24px;font-size:.85rem}
  .promo{flex-direction:column;align-items:flex-start;gap:2px}
  .queue{border-radius:22px}
  .list{grid-auto-columns:80%}
  .cta{padding:0 14px;font-size:.9rem}
}
@media (hover:none){ .hint{display:none} }
@media (prefers-reduced-motion: reduce){
  .track,.live::before{animation:none}
  #hero img,#hero svg,.pedestal::after,.promo::after,#hero.enter,#hero.swap,.info.enter > *{animation:none!important}
  .plan{transition:none}
}
</style>
</head>
<body>

<header class="top">
  <div class="agent"><b id="agentName"></b><span id="agentRole"></span></div>
  <span class="live">LIVE</span>
  <div class="spacer"></div>
  <div class="tools">
    <button class="icon" id="themeBtn" aria-label="Tukar mod gelap atau cerah"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="8"/><path d="M12 4a8 8 0 0 1 0 16z" fill="currentColor"/></svg></button>
    <button class="icon" id="fsBtn" aria-label="Skrin penuh"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 9V4h5M20 9V4h-5M4 15v5h5M20 15v5h-5"/></svg></button>
  </div>
</header>

<nav class="cats" id="cats" role="tablist" aria-label="Kategori produk"></nav>

<main class="stage">
  <section class="spot" aria-live="polite">
    <div class="pedestal"><span class="badge" id="badge"></span><div id="hero"></div></div>
    <div class="info">
      <span class="catname" id="catName"></span>
      <h1 id="pName"></h1>
      <p class="lead" id="pLead"></p>
      <ul class="specs" id="pSpecs"></ul>
      <div class="colors" id="pColors"></div>
      <div class="price"><span class="rm">RM</span><span class="num" id="pRent"></span><span class="per">sebulan<br><b id="planLbl"></b></span></div>
      <div class="plans" id="plans" role="radiogroup" aria-label="Pelan sewaan"></div>
      <p class="fit" id="pFit"><span>Sesuai untuk</span><b id="pFitTxt"></b></p>
      <ul class="feats" id="pFeats"></ul>
      <div class="promo"><span id="pPromo"></span><small id="begNo"></small></div>
    </div>
    <div class="nav"><span id="pos"></span>
      <button id="prev" aria-label="Produk sebelum">‹</button>
      <button id="next" aria-label="Produk seterusnya">›</button>
    </div>
  </section>

  <aside class="queue">
    <h2 id="queueTitle"></h2>
    <ul class="list" id="list"></ul>
  </aside>
</main>

<footer class="foot">
  <div class="cta" id="cta"></div>
  <div class="ticker"><div class="track" id="track"></div></div>
</footer>

<div class="hint">Tekan H untuk shortcut</div>
<div class="help" id="help" role="dialog" aria-label="Shortcut papan kekunci">
  <div>
    <h3>Shortcut masa live</h3>
    <dl>
      <dt><kbd>←</kbd> <kbd>→</kbd></dt><dd>Tukar produk</dd>
      <dt><kbd>↑</kbd> <kbd>↓</kbd> / <kbd>1</kbd>–<kbd>9</kbd></dt><dd>Tukar kategori</dd>
      <dt><kbd>P</kbd></dt><dd>Tukar pelan (7+0 / 5+0 / 3+2)</dd>
      <dt><kbd>C</kbd></dt><dd>Tukar warna produk (jika ada)</dd>
      <dt><kbd>F</kbd></dt><dd>Skrin penuh</dd>
      <dt><kbd>D</kbd></dt><dd>Tukar mod gelap / cerah</dd>
      <dt><kbd>H</kbd> / <kbd>Esc</kbd></dt><dd>Tutup panduan ini</dd>
    </dl>
  </div>
</div>

<script>
const SETTINGS = @json($settings);
const CATEGORIES = @json($categories);
</script>
@verbatim
<script>

const ART = {
  water:`<svg viewBox="0 0 120 180" aria-hidden="true"><rect x="22" y="10" width="76" height="160" rx="12" fill="currentColor" opacity=".92"/>
    <rect x="34" y="28" width="52" height="34" rx="6" fill="var(--pedestal)"/><circle cx="48" cy="45" r="5" fill="var(--water)"/><circle cx="72" cy="45" r="5" fill="var(--accent)"/>
    <rect x="44" y="80" width="32" height="10" rx="3" fill="var(--pedestal)"/><rect x="56" y="90" width="8" height="14" fill="var(--pedestal)"/>
    <path d="M60 112c-6 9-8 13-8 17a8 8 0 0 0 16 0c0-4-2-8-8-17z" fill="var(--water)"/><rect x="34" y="146" width="52" height="8" rx="4" fill="var(--pedestal)"/></svg>`,
  air:`<svg viewBox="0 0 120 180" aria-hidden="true"><rect x="26" y="10" width="68" height="160" rx="30" fill="currentColor" opacity=".92"/>
    <circle cx="60" cy="48" r="20" fill="var(--pedestal)"/><circle cx="60" cy="48" r="8" fill="var(--water)"/>
    <g fill="var(--pedestal)"><rect x="40" y="90" width="40" height="4" rx="2"/><rect x="40" y="102" width="40" height="4" rx="2"/><rect x="40" y="114" width="40" height="4" rx="2"/><rect x="40" y="126" width="40" height="4" rx="2"/><rect x="40" y="138" width="40" height="4" rx="2"/></g></svg>`,
  mattress:`<svg viewBox="0 0 180 120" aria-hidden="true"><rect x="10" y="38" width="160" height="50" rx="14" fill="currentColor" opacity=".92"/>
    <rect x="10" y="38" width="160" height="14" rx="7" fill="var(--water)"/><rect x="22" y="22" width="48" height="20" rx="10" fill="var(--pedestal)" stroke="currentColor" stroke-width="3"/>
    <g fill="var(--pedestal)"><circle cx="40" cy="70" r="3"/><circle cx="70" cy="70" r="3"/><circle cx="100" cy="70" r="3"/><circle cx="130" cy="70" r="3"/><circle cx="160" cy="70" r="3"/></g>
    <rect x="22" y="88" width="10" height="14" fill="currentColor"/><rect x="148" y="88" width="10" height="14" fill="currentColor"/></svg>`,
  bidet:`<svg viewBox="0 0 140 160" aria-hidden="true"><path d="M20 30h100v20c0 40-20 70-50 70S20 90 20 50z" fill="currentColor" opacity=".92"/>
    <ellipse cx="70" cy="56" rx="34" ry="22" fill="var(--pedestal)"/><rect x="104" y="40" width="26" height="40" rx="8" fill="currentColor"/>
    <circle cx="117" cy="52" r="4" fill="var(--water)"/><circle cx="117" cy="66" r="4" fill="var(--accent)"/><rect x="52" y="118" width="36" height="30" rx="6" fill="currentColor" opacity=".8"/></svg>`,
  shower:`<svg viewBox="0 0 140 170" aria-hidden="true"><path d="M30 20h50a10 10 0 0 1 10 10v26" stroke="currentColor" stroke-width="10" fill="none" stroke-linecap="round"/>
    <rect x="62" y="54" width="56" height="22" rx="11" fill="currentColor"/><rect x="74" y="58" width="32" height="14" rx="7" fill="var(--water)"/>
    <g fill="var(--water)"><circle cx="72" cy="98" r="4"/><circle cx="90" cy="104" r="4"/><circle cx="108" cy="98" r="4"/><circle cx="80" cy="124" r="4"/><circle cx="100" cy="128" r="4"/><circle cx="90" cy="150" r="4"/></g></svg>`
};

const $ = id => document.getElementById(id);
let cat = 0, idx = 0, plan = 0, colorIdx = 0;
const pick = p => p.plans[Math.min(plan, p.plans.length-1)];
const money = n => n.toLocaleString("en-MY", { minimumFractionDigits: Number.isInteger(n) ? 0 : 2, maximumFractionDigits: 2 });
const rm = n => "RM" + money(n);
/* Sen dipapar lebih kecil supaya harga besar tak terlalu lebar */
const priceHtml = n => Number.isInteger(n) ? String(n) : `${Math.floor(n)}<small class="sen">.${n.toFixed(2).split(".")[1]}</small>`;
const imgSrc = p => p.img || "";

const KIND_ICON = { water:"💧", air:"🌬️", mattress:"🛏️", massage:"💆", aircond:"❄️", bidet:"🚽", shower:"🚿" };
const SPEC_KIND = [["🔥","hot"],["❄","cold"],["🧊","ice"],["🚰","tank"]];
const reduceMotion = matchMedia("(prefers-reduced-motion: reduce)").matches;
function specChip(s){
  const cut = s.indexOf(" "), icon = cut > 0 ? s.slice(0,cut) : "", text = cut > 0 ? s.slice(cut+1) : s;
  const kind = (SPEC_KIND.find(([e]) => icon.includes(e)) || [,"amb"])[1];
  return `<li class="sp-${kind}">${icon ? `<i aria-hidden="true">${icon}</i>` : ""}${text}</li>`;
}
function replay(el, cls){ el.classList.remove(cls); void el.offsetWidth; el.classList.add(cls); }
let shownPrice = null, priceRaf = 0;
function animatePrice(to){
  const el = $("pRent"), from = shownPrice ?? to; shownPrice = to;
  cancelAnimationFrame(priceRaf);
  if(from === to || reduceMotion){ el.innerHTML = priceHtml(to); return; }
  const start = performance.now(), dur = 450;
  const step = now => {
    const k = Math.min(1, (now-start)/dur), ease = 1 - Math.pow(1-k, 3);
    if(k < 1) el.textContent = Math.round(from + (to-from)*ease); else el.innerHTML = priceHtml(to);
    if(k < 1) priceRaf = requestAnimationFrame(step);
  };
  priceRaf = requestAnimationFrame(step);
}
const visual = (p, kind, src = imgSrc(p)) => src ? `<img src="${src}" alt="${p.name}">` : `<div style="color:var(--ink);display:contents">${ART[kind] || ""}</div>`;
const colorsOf = p => p.warna || [];
const heroSrc = p => (colorsOf(p)[colorIdx] || {}).img || imgSrc(p);
function renderColors(p){
  const list = colorsOf(p), box = $("pColors");
  box.hidden = !list.length;
  if(!list.length){ box.innerHTML = ""; return; }
  box.innerHTML = `<span class="cl">Warna: <b>${list[colorIdx].nama}</b></span><div class="sw">${list.map((w,i)=>
    `<button class="dot" style="--sw:${w.hex}" data-i="${i}" aria-label="Warna ${w.nama}" title="${w.nama}" aria-pressed="${i===colorIdx}"></button>`).join("")}</div>`;
  box.querySelectorAll(".dot").forEach(b=>b.onclick=()=>setColor(+b.dataset.i));
}
function setColor(i){
  const p = CATEGORIES[cat].products[idx], n = colorsOf(p).length; if(!n) return;
  const before = heroSrc(p);
  colorIdx = (i+n)%n;
  renderColors(p);
  if(heroSrc(p) !== before){
    const c = CATEGORIES[cat];
    $("hero").innerHTML = visual(p, c.kind, heroSrc(p));
    replay($("hero"), "swap");
  }
}

function renderCats(){
  $("cats").innerHTML = CATEGORIES.map((c,i)=>
    `<button class="cat" role="tab" aria-selected="${i===cat}" data-i="${i}">${KIND_ICON[c.kind] ? `<span class="ci" aria-hidden="true">${KIND_ICON[c.kind]}</span>` : ""}${c.name}<small>${c.products.length}</small></button>`).join("");
  $("cats").querySelectorAll(".cat").forEach(b=>b.onclick=()=>setCat(+b.dataset.i));
}
function renderList(){
  const c = CATEGORIES[cat];
  $("queueTitle").textContent = `${c.products.length} produk ${c.name.toLowerCase()}`;
  $("list").innerHTML = c.products.map((p,i)=>`<li><button class="item" data-i="${i}" aria-current="${i===idx}">
    <span class="thumb${p.img?" photo":""}">${visual(p,c.kind)}</span><span><b>${p.name}</b><small>${p.ringkas || p.tag}</small></span>
    <span class="p">${rm(pick(p).bulanan)}</span></button></li>`).join("");
  $("list").querySelectorAll(".item").forEach(b=>b.onclick=()=>setProduct(+b.dataset.i));
}
function renderSpot(anim = 0){
  const c = CATEGORIES[cat], p = c.products[idx];
  if(anim){
    $("hero").style.setProperty("--dir", anim < 0 ? "-40px" : "40px");
    replay($("hero"), "enter"); replay(document.querySelector(".info"), "enter");
  }
  $("hero").innerHTML = visual(p, c.kind, heroSrc(p));
  renderColors(p);
  const ped = $("hero").parentElement;
  ped.classList.toggle("photo", !!p.img);
  ped.classList.remove("wide");
  const heroImg = $("hero").querySelector("img");
  if(heroImg){
    const markWide = () => ped.classList.toggle("wide", heroImg.naturalWidth > heroImg.naturalHeight * 1.2);
    heroImg.complete ? markWide() : heroImg.addEventListener("load", markWide, { once:true });
  }
  $("badge").textContent = p.tag;
  $("catName").textContent = c.name;
  $("pName").textContent = p.name;
  $("pLead").textContent = p.ringkas || ""; $("pLead").hidden = !p.ringkas;
  $("pFitTxt").textContent = p.sesuai || ""; $("pFit").hidden = !p.sesuai;
  $("pSpecs").innerHTML = (p.spec||[]).map(specChip).join(""); $("pSpecs").hidden = !(p.spec||[]).length;
  const pl = pick(p);
  animatePrice(pl.bulanan);
  $("planLbl").textContent = "pelan " + pl.label;
  const cheapest = Math.min(...p.plans.map(x=>x.bulanan));
  const bestIdx = p.plans.every(x=>x.bulanan===cheapest) ? -1 : p.plans.findIndex(x=>x.bulanan===cheapest);
  $("plans").innerHTML = p.plans.map((x,i)=>`<button class="plan" role="radio" data-i="${i}" aria-checked="${x===pl}">
    ${i===bestIdx ? `<em class="best">PALING JIMAT</em>` : ""}<span class="pl">${x.label}</span>
    <b class="amt">RM${priceHtml(x.bulanan)}<small>/bln</small></b><span class="nt">${x.nota}</span></button>`).join("");
  $("plans").querySelectorAll(".plan").forEach(b=>b.onclick=()=>setPlan(+b.dataset.i));
  $("pFeats").innerHTML = (p.feats||[]).map(f=>`<li>${f}</li>`).join("");
  $("pPromo").textContent = p.promo;
  $("begNo").textContent = "Masukkan dalam beg biru 🛍️";
  $("pos").textContent = `${idx+1} / ${c.products.length}`;
}
function keepVisible(){
  const list=$("list"), el=list.querySelector('[aria-current="true"]'); if(!el) return;
  const r=el.getBoundingClientRect(), l=list.getBoundingClientRect();
  if(r.left<l.left||r.right>l.right) list.scrollLeft += r.left-l.left;
  if(r.top<l.top||r.bottom>l.bottom) list.scrollTop += r.top-l.top;
}
function render(anim = 0){ renderCats(); renderList(); renderSpot(anim); }
function setCat(i){ const dir = i < cat ? -1 : 1; cat=(i+CATEGORIES.length)%CATEGORIES.length; idx=0; colorIdx=0; render(dir); }
function setProduct(i){ const dir = i < idx ? -1 : 1; const n=CATEGORIES[cat].products.length; idx=(i+n)%n; colorIdx=0; renderList(); renderSpot(dir); keepVisible(); }

function setPlan(i){ const n=Math.max(...CATEGORIES.flatMap(c=>c.products.map(p=>p.plans.length))); plan=(i+n)%n; renderList(); renderSpot(); }
const root=document.documentElement;
const canFs=!!(root.requestFullscreen||root.webkitRequestFullscreen);
function toggleFs(){
  const on=document.fullscreenElement||document.webkitFullscreenElement;
  if(on) (document.exitFullscreen||document.webkitExitFullscreen).call(document);
  else (root.requestFullscreen||root.webkitRequestFullscreen).call(root);
}
function toggleTheme(){
  const dark=root.dataset.theme ? root.dataset.theme==="dark" : matchMedia("(prefers-color-scheme: dark)").matches;
  root.dataset.theme = dark?"light":"dark";
}

document.addEventListener("keydown",e=>{
  const k=e.key.toLowerCase();
  if(k==="arrowright") setProduct(idx+1);
  else if(k==="arrowleft") setProduct(idx-1);
  else if(k==="arrowdown") setCat(cat+1);
  else if(k==="arrowup") setCat(cat-1);
  else if(/^[1-9]$/.test(k) && +k<=CATEGORIES.length) setCat(+k-1);
  else if(k==="p") setPlan(plan+1);
  else if(k==="c") setColor(colorIdx+1);
  else if(k==="f"){ if(canFs) toggleFs(); }
  else if(k==="d") toggleTheme();
  else if(k==="h") $("help").classList.toggle("open");
  else if(k==="escape") $("help").classList.remove("open");
  else return;
  if(k.startsWith("arrow")) e.preventDefault();
});
$("prev").onclick=()=>setProduct(idx-1);
$("themeBtn").onclick=toggleTheme;
if(canFs) $("fsBtn").onclick=toggleFs; else $("fsBtn").hidden=true;
/* Leret kiri/kanan atas produk untuk tukar */
let tx=0, ty=0;
const spotEl=document.querySelector(".spot");
spotEl.addEventListener("touchstart",e=>{ tx=e.touches[0].clientX; ty=e.touches[0].clientY; },{passive:true});
spotEl.addEventListener("touchend",e=>{
  const dx=e.changedTouches[0].clientX-tx, dy=e.changedTouches[0].clientY-ty;
  if(Math.abs(dx)>50 && Math.abs(dx)>Math.abs(dy)*1.5) setProduct(idx+(dx<0?1:-1));
},{passive:true});
$("next").onclick=()=>setProduct(idx+1);
$("help").onclick=e=>{ if(e.target.id==="help") $("help").classList.remove("open"); };

$("agentName").textContent = SETTINGS.agentName;
$("agentRole").textContent = SETTINGS.agentRole;
$("cta").innerHTML = `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round" aria-hidden="true"><path d="M5 8h14l-1.2 12H6.2z" fill="#1E6BFF" stroke="#1E6BFF"/><path d="M9 10V6a3 3 0 0 1 6 0v4" stroke="#06222D"/></svg><span>${SETTINGS.cta}</span>`;
const items = SETTINGS.ticker.map(t=>`<span>${t}</span>`).join("");
$("track").innerHTML = items + items;
window.addEventListener("DOMContentLoaded", ()=>{ render(1); });
</script>
@endverbatim
</body>
</html>

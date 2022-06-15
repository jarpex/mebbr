const adDict = {
  mobile: [
    {
      renderTo: "yandex_rtb_R-A-1586331-3",
      blockId: "R-A-1586331-3",
    },
    {
      renderTo: "yandex_rtb_R-A-1586331-2",
      blockId: "R-A-1586331-2",
    },
    {
      renderTo: "yandex_rtb_R-A-1586331-1",
      blockId: "R-A-1586331-1",
    },
  ],
  desktop: [
    {
      renderTo: "yandex_rtb_R-A-1586331-6",
      blockId: "R-A-1586331-6",
    },
    {
      renderTo: "yandex_rtb_R-A-1586331-5",
      blockId: "R-A-1586331-5",
    },
    {
      renderTo: "yandex_rtb_R-A-1586331-4",
      blockId: "R-A-1586331-4",
    },
  ],
};

const detect = () => {
  let fakeAd = document.createElement("div");
  fakeAd.className =
    "textads banner-ads banner_ads ad-unit ad-zone ad-space adsbox";

  fakeAd.style.height = "1px";

  document.body.appendChild(fakeAd);

  let x_width = fakeAd.offsetHeight;
  let msg = document.getElementById("msg");

  fakeAd.remove();

  if (x_width) {
    console.log("Спасибо за то, что не используешь блокировщик рекламы 💕");
    return true;
  } else {
    console.log("Пожалуйста отключи блокировщик рекламы 😢");
    return false;
  }
};

const deviceType = () => {
  if (
    window.matchMedia("(min-width: 1200px) and (orientation: landscape)")
      .matches
  ) {
    return "desktop";
  } else {
    return "mobile";
  }
};

const adRender = (device, advertID, paragraph) => {
  let adContainer = document.createElement("div");
  adContainer.className = "advert";
  let thisBlockId;
  let thisRenderTo;
  if (device == "mobile") {
    thisBlockId = adDict.mobile[advertID].blockId;
    thisRenderTo = adDict.mobile[advertID].renderTo;
  } else {
    thisBlockId = adDict.desktop[advertID].blockId;
    thisRenderTo = adDict.desktop[advertID].renderTo;
  }
  adContainer.id = thisRenderTo;
  paragraph.after(adContainer);
  window.yaContextCb.push(() => {
    Ya.Context.AdvManager.render({
      renderTo: thisRenderTo,
      blockId: thisBlockId,
    });
  });
};

if (detect()) {
  let article = document.getElementsByTagName("article")[0];
  let paragraphs = article.getElementsByTagName("p");
  let paragraphsNumber = paragraphs.length;
  let device = deviceType();
  let firstAd = false;
  let secondAd = false;
  let thirdAd = false;
  if (paragraphsNumber === 1 || paragraphsNumber === 2) {
    firstAd = paragraphs[0];
    adRender(device, 0, firstAd);
  } else if (paragraphsNumber > 2) {
    firstAd = paragraphs[1];
    adRender(device, 0, firstAd);
  }
  if (paragraphsNumber > 5) {
    secondAd = paragraphs[4];
    adRender(device, 1, secondAd);
  }
  if (paragraphsNumber > 11) {
    thirdAd = paragraphs[paragraphsNumber - 3];
    adRender(device, 2, thirdAd);
  }
}

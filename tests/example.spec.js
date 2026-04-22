const { test, expect } = require('@playwright/test');

test('precio cambia segun pais', async ({ browser }) => {

  // 🇦🇷 Argentina
  const contextAR = await browser.newContext();
  const pageAR = await contextAR.newPage();

  await pageAR.route('https://ipapi.co/json/', route =>
    route.fulfill({
      contentType: 'application/json',
      body: JSON.stringify({ country: 'AR' })
    })
  );

  await pageAR.goto('https://aprende-excel.com/');

  const priceAR = await pageAR.locator('text=/\\$|USD|ARS/').first().innerText();

  // 🇺🇸 USA
  const contextUS = await browser.newContext();
  const pageUS = await contextUS.newPage();

  await pageUS.route('https://ipapi.co/json/', route =>
    route.fulfill({
      contentType: 'application/json',
      body: JSON.stringify({ country: 'US' })
    })
  );

  await pageUS.goto('https://aprende-excel.com/');

  const priceUS = await pageUS.locator('text=/\\$|USD|ARS/').first().innerText();

  console.log('AR:', priceAR);
  console.log('US:', priceUS);

  // 🔥 VALIDACIÓN
  expect(priceAR).not.toBe(priceUS);
});
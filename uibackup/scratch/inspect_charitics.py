import re
import os
import urllib.request
from bs4 import BeautifulSoup

with open('scratch_charitics_index.html', 'r', encoding='utf-8') as f:
    html = f.read()

soup = BeautifulSoup(html, 'html.parser')

print("=== HEAD TAGS ===")
for link in soup.find_all('link', rel='stylesheet'):
    print("CSS:", link.get('href'))

for script in soup.find_all('script'):
    if script.get('src'):
        print("JS:", script.get('src'))

print("\n=== MAJOR SECTIONS / STRUCTURE ===")
for elem in soup.body.children:
    if elem.name:
        classes = elem.get('class', [])
        print(f"<{elem.name} class='{' '.join(classes)}' id='{elem.get('id', '')}'>")

print("\n=== ALL DIRECT SECTIONS UNDER BODY OR MAIN ===")
for sec in soup.find_all(['section', 'header', 'footer', 'div']):
    c = ' '.join(sec.get('class', []))
    if any(k in c for k in ['banner', 'about', 'service', 'causes', 'donation', 'event', 'project', 'team', 'testimonial', 'cta', 'blog', 'footer', 'header', 'features', 'counter']):
        print(f"<{sec.name} class='{c}'>")

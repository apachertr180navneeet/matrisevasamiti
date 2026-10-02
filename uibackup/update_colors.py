import os
import re

directory = "/www/wwwroot/matrisevasamiti.ngo"

replacements = {
    r"#ff6b35": "#f47a20",
    r"#FF6B35": "#f47a20",
    r"#e55a2e": "#d46a10",
    r"#E55A2E": "#d46a10",
    r"rgba\(255, 107, 53": "rgba(244, 122, 32",
    r"rgba\(229, 90, 46": "rgba(212, 106, 16"
}

for root, dirs, files in os.walk(directory):
    for file in files:
        if file.endswith((".php", ".css", ".js")):
            filepath = os.path.join(root, file)
            with open(filepath, 'r', encoding='utf-8', errors='ignore') as f:
                content = f.read()
            
            new_content = content
            for old, new in replacements.items():
                new_content = re.sub(old, new, new_content)
                
            if new_content != content:
                with open(filepath, 'w', encoding='utf-8') as f:
                    f.write(new_content)
                print(f"Updated {filepath}")

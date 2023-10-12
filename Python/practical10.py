import matplotlib.pyplot as plt
import numpy as np

categories = ['CategoryA', 'CategoryB', 'CategoryC', 'CategoryD', 'CategoryE','CategoryF','CategoryG']
values = np.random.randint(1, 140, len(categories))

plt.figure(figsize=(12, 8))
plt.bar(categories, values, color='skyblue')

plt.xlabel('Categories')
plt.ylabel('Values')
plt.title('Bar Chart Example')

for i, v in enumerate(values):
    plt.text(i, v + 2, str(v), ha='center', va='bottom', fontsize=12)

plt.xticks(rotation=45)
plt.tight_layout()
plt.show()

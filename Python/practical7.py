import numpy as np
import matplotlib.pyplot as plt
from scipy.stats import norm, poisson

data = norm.rvs(loc=0, scale=1, size=500)

mean = np.mean(data)
std_dev = np.std(data)
print(f"Mean: {mean:.2f}")
print(f"Standard Deviation: {std_dev:.2f}")

x = np.linspace(-5, 5, 200)
pdf = norm.pdf(x, loc=mean, scale=std_dev)

plt.figure(figsize=(12, 5))
plt.subplot(121)
plt.plot(x, pdf, label='PDF')
plt.title('Probability Density Function (PDF)')
plt.xlabel('X')
plt.ylabel('Probability Density')
plt.legend()
cdf = norm.cdf(x, loc=mean, scale=std_dev)

plt.subplot(122)
plt.plot(x, cdf, label='CDF', color='orange')
plt.title('Cumulative Distribution Function (CDF)')
plt.xlabel('X')
plt.ylabel('Cumulative Probability')
plt.legend()

plt.tight_layout()
plt.show()

poisson_data = poisson.rvs(mu=3, size=500)  
unique_values, counts = np.unique(poisson_data, return_counts=True)

plt.figure(figsize=(12, 5))
plt.subplot(121)
plt.bar(unique_values, counts/len(poisson_data), label='PMF', width=0.8)
plt.title('Probability Mass Function (PMF) - Poisson Distribution')
plt.xlabel('X')
plt.ylabel('Probability')
plt.legend()

cdf_poisson = poisson.cdf(unique_values, mu=4)

plt.subplot(122)
plt.plot(unique_values, cdf_poisson, label='CDF', color='orange')
plt.title('Cumulative Distribution Function (CDF) - Poisson Distribution')
plt.xlabel('X')
plt.ylabel('Cumulative Probability')
plt.legend()

plt.tight_layout()
plt.show()

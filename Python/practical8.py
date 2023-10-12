import numpy as np
import matplotlib.pyplot as plt
from scipy import stats

np.random.seed(60)
population_mean = 450
population_stddev = 30
population_size = 500000
population_data = np.random.normal(population_mean, population_stddev, population_size)

sample_size = 60
num_samples = 2000
sample_means = []

for _ in range(num_samples):
    sample = np.random.choice(population_data, sample_size)
    sample_means.append(np.mean(sample))

plt.figure(figsize=(12, 6))

plt.subplot(121)
plt.hist(population_data, bins=50, density=True, alpha=0.6, color='blue', label='Population')
plt.title('Population Distribution')
plt.xlabel('Value')
plt.ylabel('Probability Density')

plt.subplot(122)
plt.hist(sample_means, bins=50, density=True, alpha=0.6, color='green', label='Sample Means')
plt.title('Sample Means Distribution')
plt.xlabel('Sample Mean')
plt.ylabel('Probability Density')
plt.axvline(population_mean, color='red', linestyle='dashed', linewidth=2, label='Population Mean')

plt.legend()
plt.tight_layout()
plt.show()

sample_mean = np.mean(sample_means)
print(f"Point Estimate of Population Mean: {sample_mean:.2f}")

confidence_level = 0.95
z_score = stats.norm.ppf((1 + confidence_level) / 2)
margin_of_error = z_score * (population_stddev / np.sqrt(sample_size))
confidence_interval = (sample_mean - margin_of_error, sample_mean + margin_of_error)
print(f"Confidence Interval (95%): {confidence_interval}")

hypothesized_mean = 105
t_statistic, p_value = stats.ttest_1samp(sample_means, hypothesized_mean)
print(f"T-statistic: {t_statistic:.2f}")
print(f"P-value: {p_value:.4f}")

alpha = 0.05  
if p_value < alpha:
    print(f"Reject the null hypothesis. The population mean is different from {hypothesized_mean}.")
else:
    print(f"Fail to reject the null hypothesis. There is not enough evidence to suggest a difference.")

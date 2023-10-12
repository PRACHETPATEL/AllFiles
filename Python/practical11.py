import seaborn as sns
import matplotlib.pyplot as plt

iris = sns.load_dataset("/iris.csv")

sns.set(style="ticks")
sns.pairplot(iris, hue="species", markers=["o", "s", "D"])

plt.figure(figsize=(12, 6))
plt.subplot(1, 2, 1)
sns.boxplot(x="species", y="sepal_length", data=iris)
plt.title("Box Plot of Sepal Length by Species")
plt.subplot(1, 2, 2)
sns.boxplot(x="species", y="petal_length", data=iris)
plt.title("Box Plot of Petal Length by Species")

plt.figure(figsize=(8, 6))
sns.violinplot(x="species", y="sepal_length", data=iris)
plt.title("Violin Plot of Sepal Length by Species")

plt.tight_layout()
plt.show()

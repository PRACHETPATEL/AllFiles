import pandas as pd
import numpy as np

data = {
    'A': np.random.rand(20),
    'B': np.random.randint(1, 20, 20),
    'C': [np.nan, 2, 3, 4, np.nan, 6, 7, 8, np.nan, 10,np.nan, 12, 13, 14, np.nan, 16, 17, 18, np.nan, 20],
    'D': [1, 2, 3, 4, 5, 6, np.nan, 8, 9, np.nan,11, 12, 13, 14, 15, 16, np.nan, 18, 19, np.nan],
}

df = pd.DataFrame(data)
print("OriginalDataFrame:") 
print(df)

columns_with_missing = df.columns[df.isnull().any()]
print(f"Columnswithmissingvalues:\n{columns_with_missing}")
missing_value_counts = df[columns_with_missing].isnull().sum()
print(f"Missing value count: \n{missing_value_counts}")

null_values_exist = df.isnull().values.any()
print(f"Null valueexist?{null_values_exist}")
df.dropna(inplace=True, axis=0)
df.dropna(inplace=True, axis=1)
print(f"After dropping rows and cols with missing values: \n{df}")

df.drop_duplicates(inplace=True)
print(f"Afterremovingduplicates:\n{df}")

subset_by_label = df[['A', 'B']]
print(f"A&B:\n{subset_by_label}")
subset_range = df[2:5]
print(f"Rows 2->4:\n{subset_range}")

subset_iloc = df.iloc[1:4, 0:2]
print(f"Rows 1->3&Cols 0->1 \n{subset_iloc}")

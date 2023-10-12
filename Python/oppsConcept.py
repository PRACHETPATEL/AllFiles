from typing_extensions import Self
print("Opps Concept")
class Person:
    def __init__(self,name,age):
       self.name=name;
       self.age=age;
    def display(self):
        print("Name:",self.name," Age:",self.age);
p=Person("Prachet",19)
p.display()
print("multiple Inheritance")
class class1(Person):
    def __init__(self):
        pass
    def display(self):
        print("Name:",self.name," Age:",self.age);
class class2:
    def __init__(self):
        print("In class 2")
    def display(self):
        print("Display of class 2");
class class3(class1,class2):
    def __init__(self):
        print("In class 3")
    def display(self):
        print("Display of class 3");
obj=class3();
obj.display();


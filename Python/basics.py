import sys
sys.stdout.write("how are you?\n")
x=input("reply:")
if x=="good" or x=="I am good" or x=="fine" or x=="I am fine":
    print("nice to hear that")
else:
    print("hope everything goes well")
print("Enter two numbers: ")
a=input()#can also print using input method, input("...")
b=input()
print("a+b",int(a)+int(b))
print("a-b",int(a)-int(b))
print("a*b",int(a)*int(b))
print("a/b",int(a)/int(b))
print("a%b",int(a)%int(b))
print("a**b",int(a)**int(b))#exponent
print("a//b",int(a)//int(b))#floor value

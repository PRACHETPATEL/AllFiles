/*Define a class named Book with data members book_name, book_id, book_price and a static member count. Define a static function count_book() to keep a count of the number of books. Write set() and show() functions to initialize and display the members. Use default arguments for the set() functions.
 */
#include <iostream>
#include <string>
using namespace std;
class Book
{
public:
    static int count;
    string book_name;
    int book_id;
    float book_price;
    static void count_book()
    {
        cout << "Total number of books: " << count << endl;
    }
    void set(string name, int id, double price)
    {
        book_name = name;
        book_id = id;
        book_price = price;
        count++;
    }
    void show()
    {
        cout << book_name << " " << book_id << " " << book_price << endl;
    }
};
int Book::count=0;
int main()
{
    Book *b1=new Book();
    Book *b2=new Book();
    b1->set("hello", 101, 10.99);
    b2->set("hello", 102, 10.99);
    b1->show();
    b2->show();
    Book::count_book();
    return 0;
}
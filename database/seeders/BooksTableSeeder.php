<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'To Kill a Mockingbird',
                'description' => 'A classic novel about racial injustice and moral growth in the American South of the 1930s, seen through the eyes of a young girl named Scout Finch.',
                'author' => 'Harper Lee',
                'genre' => 'Classic Fiction',
                'image' => 'mockingbird.jpg',
                'available' => true,
            ],
            [
                'title' => '1984',
                'description' => 'A dystopian novel set in a totalitarian society where critical thought is suppressed and a cult of personality is centered on Big Brother.',
                'author' => 'George Orwell',
                'genre' => 'Dystopian Fiction',
                'image' => '1984.jpg',
                'available' => true,
            ],
            [
                'title' => 'Pride and Prejudice',
                'description' => 'A romantic novel that follows the emotional development of Elizabeth Bennet, who learns about the repercussions of hasty judgments.',
                'author' => 'Jane Austen',
                'genre' => 'Romance',
                'image' => 'pride_prejudice.jpg',
                'available' => true,
            ],
            [
                'title' => 'The Great Gatsby',
                'description' => 'A novel that examines themes of decadence, idealism, social upheaval, and resistance to change through the story of the fabulously wealthy Jay Gatsby.',
                'author' => 'F. Scott Fitzgerald',
                'genre' => 'Classic Fiction',
                'image' => 'gatsby.jpg',
                'available' => true,
            ],
            [
                'title' => 'The Hobbit',
                'description' => 'A fantasy novel about the adventures of hobbit Bilbo Baggins, who is convinced by the wizard Gandalf to join a group of dwarves to reclaim their mountain home.',
                'author' => 'J.R.R. Tolkien',
                'genre' => 'Fantasy',
                'image' => 'hobbit.jpg',
                'available' => true,
            ],
            [
                'title' => 'The Catcher in the Rye',
                'description' => 'A novel that tells the story of a teenager named Holden Caulfield and his experiences in New York City after being expelled from prep school.',
                'author' => 'J.D. Salinger',
                'genre' => 'Coming-of-age Fiction',
                'image' => 'catcher.jpg',
                'available' => true,
            ],
            [
                'title' => 'Harry Potter and the Philosopher\'s Stone',
                'description' => 'The first novel in the Harry Potter series follows Harry Potter, a young wizard who discovers his magical heritage on his eleventh birthday.',
                'author' => 'J.K. Rowling',
                'genre' => 'Fantasy',
                'image' => 'harry_potter.jpg',
                'available' => true,
            ],
            [
                'title' => 'The Lord of the Rings',
                'description' => 'An epic high-fantasy novel about the quest to destroy the One Ring, a powerful artifact created by the Dark Lord Sauron.',
                'author' => 'J.R.R. Tolkien',
                'genre' => 'Fantasy',
                'image' => 'lotr.jpg',
                'available' => true,
            ],
            [
                'title' => 'Brave New World',
                'description' => 'A dystopian novel set in a futuristic World State, inhabited by genetically modified citizens and an intelligence-based social hierarchy.',
                'author' => 'Aldous Huxley',
                'genre' => 'Dystopian Fiction',
                'image' => 'brave_new_world.jpg',
                'available' => true,
            ],
            [
                'title' => 'The Alchemist',
                'description' => 'A novel about a young Andalusian shepherd who dreams of finding worldly treasures and embarks on a journey to find a hidden treasure in the Egyptian pyramids.',
                'author' => 'Paulo Coelho',
                'genre' => 'Fiction',
                'image' => 'alchemist.jpg',
                'available' => true,
            ]
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
} 
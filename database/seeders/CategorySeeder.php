<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            // ✅ Programming Languages
            'PHP', 'JavaScript', 'Python', 'Java', 'C', 'C++', 'C#', 'Go', 'Rust', 'Swift', 'Kotlin', 'Ruby',
            'Dart', 'TypeScript', 'Perl', 'Scala', 'Objective-C', 'Haskell', 'Lua', 'Elixir', 'Clojure', 'F#',
            'Shell Scripting', 'R', 'MATLAB', 'SQL', 'GraphQL',

            // ✅ Frontend Frameworks
            'React.js', 'Vue.js', 'Angular', 'Svelte', 'SolidJS', 'Alpine.js', 'Next.js', 'Nuxt.js', 'Qwik',
            'Backbone.js', 'Ember.js', 'Gatsby.js', 'Lit',

            // ✅ Backend Frameworks
            'Laravel', 'Symfony', 'CodeIgniter', 'Slim', 'NestJS', 'Express.js', 'Koa', 'Fastify', 'Django',
            'Flask', 'Spring Boot', 'ASP.NET Core', 'Ruby on Rails', 'FastAPI', 'Micronaut', 'Gin (Go)', 'Fiber (Go)',
            'Phoenix (Elixir)', 'Rocket (Rust)',

            // ✅ Full-Stack & Meta-Frameworks
            'Blazor', 'Remix', 'Meteor.js', 'RedwoodJS',

            // ✅ Mobile & Cross-Platform Frameworks
            'React Native', 'Flutter', 'Ionic', 'Cordova', 'Xamarin', 'SwiftUI', 'Jetpack Compose', 'NativeScript',

            // ✅ Game Development Frameworks & Engines
            'Unity', 'Unreal Engine', 'Godot', 'Cocos2d', 'Pygame', 'LibGDX', 'CryEngine', 'Phaser.js',

            // ✅ Dev Concepts
            'Backend', 'Frontend', 'Full Stack', 'Microservices', 'Monolith', 'Serverless', 'REST API', 'GraphQL API',
            'DevOps', 'Agile', 'Scrum', 'Kanban', 'CI/CD', 'TDD', 'BDD', 'Clean Code', 'SOLID Principles',
            'Design Patterns', 'Event-Driven Architecture', 'Domain-Driven Design',

            // ✅ Networking & Infrastructure
            'TCP/IP', 'HTTP/HTTPS', 'DNS', 'VPN', 'Firewall', 'Load Balancing', 'Proxy', 'CDN', 'Cloud Computing',
            'WebSockets', 'MQTT', 'Zero Trust Security', 'Containerization', 'Kubernetes', 'Docker',

            // ✅ Cloud & Serverless Platforms
            'AWS', 'Azure', 'Google Cloud', 'Firebase', 'DigitalOcean', 'Netlify', 'Vercel', 'Heroku',

            // ✅ Databases & Data Storage
            'MySQL', 'PostgreSQL', 'MongoDB', 'SQLite', 'Redis', 'Cassandra', 'Elasticsearch', 'Neo4j', 'DynamoDB',
            'InfluxDB', 'ClickHouse',

            // ✅ Message Brokers & Queues
            'RabbitMQ', 'Kafka', 'ActiveMQ', 'Amazon SQS', 'Google Pub/Sub', 'NATS',

            // ✅ Build Tools & Package Managers
            'Webpack', 'Vite', 'Rollup', 'Parcel', 'Babel', 'npm', 'yarn', 'pnpm', 'Bun',

            // ✅ Version Control & Collaboration
            'Git', 'GitHub', 'GitLab', 'Bitbucket', 'Subversion',

            // ✅ Testing & Debugging
            'Jest', 'Mocha', 'Cypress', 'Selenium', 'Puppeteer', 'PyTest', 'JUnit', 'Postman',

            // ✅ AI & Machine Learning Frameworks
            'TensorFlow', 'PyTorch', 'Keras', 'Scikit-learn', 'Hugging Face Transformers', 'OpenCV',

            // ✅ Blockchain & Web3
            'Ethereum', 'Solidity', 'Rust (for Solana)', 'Hyperledger', 'Polkadot', 'IPFS' ,

            //'Other
            'Other'
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
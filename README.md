# Cleaf Framework

Cleaf is a lightweight, open-source PHP web framework designed to simplify web development while maintaining flexibility and power. Developed and maintained by [Satriyo](https://github.com/satrijo), Cleaf offers an intuitive structure that makes it an excellent choice for both beginners and experienced developers.

## Features

- **Lightweight**: Cleaf is designed to be fast and efficient, with minimal overhead.
- **PSR Compliant**: Implements [PSR-4](https://www.php-fig.org/psr/psr-4/) for autoloading.
- **Easy to Learn**: Simple structure and clear documentation make it easy for newcomers to get started.
- **Flexible**: Suitable for small web applications to large-scale projects.
- **Open Source**: All source code is publicly available on [GitHub](https://github.com/satrijo/Cleaf).
- **Community-Sourced**: Cleaf is developed by the community and maintained by the community.
- **Easy To Use**: Cleaf is designed to be easy to use and understand.
- **Extensible**: Cleaf is extensible and can be easily customized to meet the needs of your application.
- **Modular**: Cleaf is modular and can be easily extended to add new functionality.
- **Reliable**: Cleaf is reliable and provides a robust and reliable development experience.
- **TailwindCSS Compatible**: Cleaf is compatible with the [TailwindCSS](https://tailwindcss.com/) framework.

## Getting Started

### Prerequisites

- PHP 8.0 or higher
- Composer (for dependency management)
- Git
- Node.js or NPM

### Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/satrijo/Cleaf.git
   ```

2. Navigate to the project directory:
   ```bash
   cd Cleaf
   ```

3. Install dependencies:
   ```bash
   composer install
   npm install
   ```

### Migration

Before you start using Cleaf, you need to migrate your database to the latest version.
Please edit the `database/schema.sql` or `database/demo.sql` file to your needs.
Setup your database connection in the `app/Config/App.php` file.

To migrate your database to the latest version, run the following command:

```bash
php migrate.php database/schema.sql
or
php migrate.php database/demo.sql
```

Default is `database/schema.sql`. If you want to migrate your database to the latest version, you can use `database/demo.sql`.
```bash
Demo account: admin@admin.com
Demo password: admin123
```

### Running the Application

To start the built-in PHP development server:

```bash
npm run dev
```

You can now access your Cleaf application at `http://localhost:9899` .

## Contributing

We welcome contributions from the community! Here are ways you can contribute:

1. **Submitting Issues**: Report bugs or suggest features on our [GitHub Issues](https://github.com/satrijo/Cleaf/issues) page.
2. **Improving Documentation**: Help us improve our documentation to make Cleaf more accessible.
3. **Writing Code**: Submit pull requests with bug fixes, new features, or improvements.

Please read our [Contributing Guidelines](CONTRIBUTING.md) before making a contribution.

## Support

If you'd like to support the project financially, you can make a donation to help sustain development and cover project-related costs. Your contributions enable us to continue delivering new features and updates to Cleaf.

[Donate to Cleaf](https://trakteer.id/cleaf/tip)

## License

Cleaf is open-source software licensed under the MIT license. See the [LICENSE](LICENSE) file for more details.

## Contact

For questions, suggestions, or support, please reach out to Satriyo:

- GitHub: [@satrijo](https://github.com/satrijo)
- Email: mail@satrio.dev

---

Thank you for choosing Cleaf Framework. We hope it empowers you to build amazing web applications!
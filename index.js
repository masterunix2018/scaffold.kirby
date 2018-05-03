#!/usr/bin/env node

/* NPM LINK to make this script available globally */
/* SCAFFOLD CREATE <NAME> to scaffold Kirby folder */

const prog = require('caporal');
const prompt = require('prompt');
const shell = require('shelljs');
const fs = require('fs');
const colors = require('colors/safe');

prog
  .version('1.0.0')
  .command('create', 'Create a new Kirby folder')
  .argument('<name>', 'Name of the project')
  .action(async (args, options, logger) => {
    const templatePath = `${__dirname}/templates/`;
    const localPath = process.cwd() + `/${args.name}.kirby`;
    shell.rm('-rf', `${args.name}.kirby`);
    logger.info(`>>> Creating new Kirby directory ...`);
    shell.mkdir(`${args.name}.kirby`);

    //logger.info(`Cloning plainkit ...`);
    await new Promise((resolve, reject) =>
      shell.exec(
        'git clone --recursive https://github.com/getkirby/plainkit ' + localPath,
        error => {
          if (error) {
            return reject(error);
          }
          resolve();
        }
      )
    );

    logger.info(`>>> Cloning uniform ...`);
    await new Promise((resolve, reject) =>
      shell.exec(
        'cd ' +
          localPath +
          ' && git submodule add https://github.com/mzur/kirby-uniform.git site/plugins/uniform',
        error => {
          if (error) {
            return reject(error);
          }
          resolve();
        }
      )
    );

    logger.info(`>>> Initializing submodule Kirby ...`);
    await new Promise((resolve, reject) =>
      shell.exec(
        'cd ' +
          localPath +
          ' && rm -rf kirby && git rm --cached -r kirby && git submodule add --force https://github.com/getkirby/kirby.git',
        error => {
          if (error) {
            return reject(error);
          }
          resolve();
        }
      )
    );

    logger.info(`>>> Initializing submodule Panel ...`);
    await new Promise((resolve, reject) =>
      shell.exec(
        'cd ' +
          localPath +
          ' && rm -rf panel && git rm --cached -r panel && git submodule add --force https://github.com/getkirby/panel.git',
        error => {
          if (error) {
            return reject(error);
          }
          resolve();
        }
      )
    );

    logger.info(`>>> Updating submodules ...`);
    await new Promise((resolve, reject) =>
      shell.exec('cd ' + localPath + ' && git submodule update --init --recursive', error => {
        if (error) {
          return reject(error);
        }
        resolve();
      })
    );

    logger.info(`>>> Copying template files ...`);
    shell.cp('-R', `${templatePath}/*`, `${localPath}`);

    Object.keys(args).forEach(variable => {
      shell.sed(
        '-i',
        `\\[${variable.toUpperCase()}\\]`,
        args[variable],
        localPath + '/package.json'
      );
    });

    logger.info(`>>> First commit`);
    await new Promise((resolve, reject) =>
      shell.exec('cd ' + localPath + ' && git add . && git commit -m "first commit"', error => {
        if (error) {
          return reject(error);
        }
        resolve();
      })
    );

    logger.info(`>>> NPM Install`);
    await new Promise((resolve, reject) =>
      shell.exec('cd ' + localPath + ' && npm install', error => {
        if (error) {
          return reject(error);
        }
        resolve();
      })
    );

    logger.info('✔ Success!');
  });

prog.parse(process.argv);
